<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\ReservationStoreRequest;
use App\Models\Admin;
use App\Models\Event;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function show(): Response
    {
        $services = Service::where('active', '=', '1')->orderBy('position', 'asc')->get();

        $admins = Admin::where([
            ['is_barber', '=', '1'],
            ['active', '=', '1']
        ])->orderBy('position', 'asc')->get();

        return response()->view('welcome', ['services' => $services, 'admins' => $admins]);
    }

    public function availability(Request $request)
    {
        $date = $request->get('date');
        $barber = (int)$request->get('barber');

        try {
            $date = \DateTime::createFromFormat('Y-m-d', $date);
        } catch (\Exception $exception) {

        }

        if ($date instanceof \DateTime && $barber > 0) {
            return $this->checkAvailability($date, $barber);
        }

        return response()->json([
            'system' => [
                'code' => 404,
                'message' => 'Not Found',
            ],
        ]);
    }

    protected function checkAvailability(\DateTime $date, int $barber)
    {
        $admin = Admin::find($barber);

        if (!$admin instanceof Admin) {
            return $this->complete([], 'Holič nenalezen');
        }

        if (!$admin->is_barber) {
            return $this->complete([], 'Holič nenalezen');
        }

        if (!in_array((int)$date->format('w'), Admin::WORKING_DAYS)) {
            return $this->complete([], 'V tento den holič nepracuje');
        }


        return $this->complete($this->getAvailableTimes($admin, $date), 'V tento den je holič plně obsazen');
    }

    protected function getAvailableTimes(Admin $admin, \DateTime $date)
    {
        $events = Event::where([
            ['admin_id', '=', $admin->id],
            ['date_start', '<=', $date->format('Y-m-d 23:59:59')],
            ['date_end', '>=', $date->format('Y-m-d 00:00:00')]
        ])->get();

        $hours = Admin::WORKING_HOURS;
        $exclude = [];
        $available = [];

        if ($events->count() === 0) {
            return $hours;
        }

        foreach ($hours as $hour) {
            foreach ($events as $event) {
                $sHour = (string)$hour;
                if (strlen($sHour) === 1) {
                    $sHour = '0' . $sHour;
                }
                $hFormat = $date->format('Y-m-d') . ' ' . $sHour . ':00:00';
                $eStart = $event->date_start->format('Y-m-d H:i:00');
                $eEnd = $event->date_end->modify('-1 seconds')->format('Y-m-d H:i:s');

                if ($eStart <= $hFormat && $eEnd >= $hFormat) {
                    if (!in_array($hour, $exclude)) {
                        $exclude[] = $hour;
                    }
                }
            }
        }

        foreach ($hours as $hour) {
            if (!in_array($hour, $exclude)) {
                $available[] = $hour;
            }
        }

        return $available;
    }

    protected function complete(array $data, string $message, int $code = 200)
    {
        return response()->json([
            'system' => [
                'code' => $code,
                'message' => $message,
            ],
            'data' => $data,
        ]);
    }

    public function reservation(ReservationStoreRequest $request)
    {
        $data = $request->safe()->all();

        $data['time'] = (int)$data['time'];

        $barber = Admin::find($data['barber']);
        $service = Service::find($data['service']);
        $dateStart = \DateTime::createFromFormat('Y-m-d H:i:s', $data['date'] . ' ' . $data['time'] . ':00:00');
        $dateEnd = clone $dateStart;
        $dateEnd->modify('+ 1 hours');

        $available = $this->getAvailableTimes($barber, $dateStart);

        if (!in_array($data['time'], $available)) {
            return $this->complete([], 'Požadovaný čas již není dostupný', 422);
        }

        $reservation = [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'service' => $service->title,
            'barber' => $barber->name,
        ];

        $event = new Event();
        $event->admin_id = $data['barber'];
        $event->reservation = $reservation;
        $event->date_start = $dateStart;
        $event->date_end = $dateEnd;
        $event->title = 'Rezervace ' . $data['name'];
        $event->save();

        return $this->complete([], 'OK');
    }
}

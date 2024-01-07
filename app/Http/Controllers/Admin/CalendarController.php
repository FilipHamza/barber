<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CalendarController extends Controller
{
    public function show()
    {
        if (!Gate::allows('barber')) {
            return view('admin.error.403');
        }

        return view('admin.calendar', ['section' => 'Kalendář']);
    }

    public function events(Request $request)
    {
        if (!Gate::allows('barber')) {
            return response()->json('Nemáte oprávnění pro tuto akci', 403);
        }

        $start = $request->get('start', null);
        $end = $request->get('end', null);

        if (empty($start) || empty($end)) {
            return response()->json([]);
        }

        $start = explode('T', $start)[0];
        $end = explode('T', $end)[0];
        $start = strtotime($start);
        $end = strtotime($end);

        if (!$start || !$end) {
            return response()->json([]);
        }

        $start = date('Y-m-d', $start);
        $end = date('Y-m-d', $end);

        $events = Event::ofAdmin(Auth::id())->startsAfter($start)->endsBefore($end)->get();


        $data = [];

        foreach ($events as $event) {
            $detail = $event->reservation ?? [];
            $isReservation = true;

            if (empty($detail)) {
                $isReservation = false;
            }

            $detail['reservation'] = $isReservation;
            $detail['id'] = $event->id;

            $data[] = [
                'title' => $event->title,
                'start' => $event->date_start->format('Y-m-d\TH:i:s'),
                'end' => $event->date_end->format('Y-m-d\TH:i:s'),
                'detail' => $detail
            ];
        }

        return response()->json($data);
    }

    public function deleteEvent($event, Request $request)
    {
        if (!Gate::allows('barber')) {
            return response()->json('Nemáte oprávnění pro tuto akci', 403);
        }

        $event = Event::find($event);

        if (!$event instanceof Event) {
            return response()->json('Událost nenalezena', 404);
        }

        if ($event->admin_id !== Auth::id()) {
            return response()->json('Nemáte oprávnění pro tuto akci', 403);
        }

        $event->delete();

        $request->session()->flash('message', 'Událost smazána');
        return response()->json('OK');

    }
}

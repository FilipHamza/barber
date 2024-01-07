<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminStoreRequest;
use App\Http\Requests\Admin\AdminUpdateRequest;
use App\Http\Requests\Admin\ServiceStoreRequest;
use App\Http\Requests\Admin\ServiceUpdateRequest;
use App\Models\Admin;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ServicesController extends Controller
{
    public function list()
    {
        if (!Gate::allows('admin')) {
            return view('admin.error.403');
        }

        $services = Service::orderBy('id', 'asc')->get();

        return view('admin.services-list', ['section' => 'Služby', 'services' => $services]);
    }

    public function show($service)
    {
        if (!Gate::allows('admin')) {
            return view('admin.error.403');
        }

        $service = (int)$service;

        if ($service === 0) {
            return view('admin.services-detail', ['section' => 'Nová služba', 'service' => null]);
        }

        $model = Service::find($service);

        if (!$model instanceof Service) {
            return view('admin.error.404', ['message' => 'Požadovanou službu se nepodařilo najít!']);
        }

        return view('admin.services-detail', ['section' => 'Detail služby', 'service' => $model]);
    }

    public function store(ServiceStoreRequest $request)
    {
        if (!Gate::allows('admin')) {
            $request->session()->flash('error', 'K této akci nemáte oprávnění!');
            return redirect(route('admin.get.services.list'));
        }

        $model = new Service();

        $data = $request->safe()->all();

        $model->title = $data['title'];
        $model->icon = $data['icon'];
        $model->desc = $data['desc'];
        $model->position = (int)$data['position'];
        $model->active = (bool)$data['active'];
        $model->save();

        $request->session()->flash('message', 'Služba přidána');
        return redirect(route('admin.get.services.show', ['service' => $model->id]));
    }

    public function update($service, ServiceUpdateRequest $request)
    {
        if (!Gate::allows('admin')) {
            $request->session()->flash('error', 'K této akci nemáte oprávnění!');
            return redirect(route('admin.get.services.list'));
        }

        $service = (int)$service;

        $model = Service::find($service);

        if (!$model instanceof Service) {
            $request->session()->flash('error', 'Služba nenalezena!');
            return redirect(route('admin.get.services.list'));
        }

        $data = $request->safe()->all();

        $model->title = $data['title'];
        $model->icon = $data['icon'];
        $model->desc = $data['desc'];
        $model->position = (int)$data['position'];
        $model->active = (bool)$data['active'];

        $model->save();

        $request->session()->flash('message', 'Data uložena');
        return redirect(route('admin.get.services.show', ['service' => $model->id]));
    }

    public function delete($service, Request $request)
    {
        if (!Gate::allows('admin')) {
            $request->session()->flash('error', 'K této akci nemáte oprávnění!');
            return redirect(route('admin.get.services.list'));
        }

        $service = (int)$service;

        $model = Service::find($service);

        if (!$model instanceof Service) {
            $request->session()->flash('error', 'Služba nenalezena!');
            return redirect(route('admin.get.services.list'));
        }

        $model->delete();

        $request->session()->flash('message', 'Služba smazána');
        return redirect(route('admin.get.services.list'));
    }
}

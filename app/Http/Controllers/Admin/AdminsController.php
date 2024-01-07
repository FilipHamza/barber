<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminStoreRequest;
use App\Http\Requests\Admin\AdminUpdateRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AdminsController extends Controller
{
    public function list()
    {
        if (!Gate::allows('admin')) {
            return view('admin.error.403');
        }

        $admins = Admin::where('id', '!=', Auth::id())->get();

        return view('admin.admins-list', ['section' => 'Uživatelé', 'admins' => $admins]);
    }

    public function show($admin)
    {
        if (!Gate::allows('admin')) {
            return view('admin.error.403');
        }

        $admin = (int)$admin;

        if ($admin === Auth::id()) {
            return view('admin.error.403', ['message' => 'Nemůžete upravovat sám sebe!']);
        }

        if ($admin === 0) {
            return view('admin.admins-detail', ['section' => 'Nový uživatel', 'admin' => null]);
        }

        $model = Admin::find($admin);

        if (!$model instanceof Admin) {
            return view('admin.error.404', ['message' => 'Požadovanou osobu se nepodařilo najít!']);
        }

        return view('admin.admins-detail', ['section' => 'Detail uživatele', 'admin' => $model]);
    }

    public function store(AdminStoreRequest $request)
    {
        if (!Gate::allows('admin')) {
            $request->session()->flash('error', 'K této akci nemáte oprávnění!');
            return redirect(route('admin.get.admins.list'));
        }

        $model = new Admin();

        $data = $request->safe()->all();

        $photo = $data['photo'] ?? null;
        if ($photo instanceof UploadedFile) {
            $type = $photo->getMimeType();
            $content = base64_encode(file_get_contents($photo->path()));
            $photo = sprintf('data:%s;base64,%s', $type, $content);
        }

        $model->name = $data['name'];
        $model->email = $data['email'];
        $model->is_admin = (bool)$data['is_admin'];
        $model->is_barber = (bool)$data['is_barber'];
        $model->active = (bool)$data['active'];
        $model->password = bcrypt($data['new_password']);
        $model->note = $data['note'] ?? null;
        $model->position = (int)$data['position'];
        $model->photo = $photo;
        $model->save();

        $request->session()->flash('message', 'Uživatel přidán');
        return redirect(route('admin.get.admins.show', ['admin' => $model->id]));
    }

    public function update($admin, AdminUpdateRequest $request)
    {
        if (!Gate::allows('admin')) {
            $request->session()->flash('error', 'K této akci nemáte oprávnění!');
            return redirect(route('admin.get.admins.list'));
        }

        $admin = (int)$admin;

        if ($admin === Auth::id()) {
            $request->session()->flash('error', 'Nemůžete upravovat sám sebe!');
            return redirect(route('admin.get.admins.list'));
        }

        $model = Admin::find($admin);

        if (!$model instanceof Admin) {
            $request->session()->flash('error', 'Uživatel nenalezen!');
            return redirect(route('admin.get.admins.list'));
        }

        $data = $request->safe()->all();

        $photo = $data['photo'] ?? null;
        if ($photo instanceof UploadedFile) {
            $type = $photo->getMimeType();
            $content = base64_encode(file_get_contents($photo->path()));
            $photo = sprintf('data:%s;base64,%s', $type, $content);
        }

        $model->name = $data['name'];
        $model->is_admin = (bool)$data['is_admin'];
        $model->is_barber = (bool)$data['is_barber'];
        $model->active = (bool)$data['active'];
        $model->note = $data['note'] ?? null;
        $model->position = (int)$data['position'];
        $model->photo = $photo;
        $new_password = $data['new_password'] ?? null;
        if (!empty($new_password)) {
            $model->password = bcrypt($new_password);
        }

        $model->save();

        $request->session()->flash('message', 'Data uložena');
        return redirect(route('admin.get.admins.show', ['admin' => $model->id]));
    }

    public function delete($admin, Request $request)
    {
        if (!Gate::allows('admin')) {
            $request->session()->flash('error', 'K této akci nemáte oprávnění!');
            return redirect(route('admin.get.admins.list'));
        }

        $admin = (int)$admin;

        if ($admin === Auth::id()) {
            $request->session()->flash('error', 'Nemůžete mazat sám sebe!');
            return redirect(route('admin.get.admins.list'));
        }

        $model = Admin::find($admin);

        if (!$model instanceof Admin) {
            $request->session()->flash('error', 'Uživatel nenalezen!');
            return redirect(route('admin.get.admins.list'));
        }

        $model->delete();

        $request->session()->flash('message', 'Uživatel smazán');
        return redirect(route('admin.get.admins.list'));
    }
}

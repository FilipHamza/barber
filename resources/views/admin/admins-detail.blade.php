@extends ('admin.layout.base')

@section ('content')

    <form class="mt-3" method="post" enctype="multipart/form-data"
          action="@isset($admin) {{ route('admin.post.admins.update', ['admin' => $admin->id]) }} @else {{ route('admin.post.admins.store') }} @endisset">
        {{ csrf_field() }}
        <div class="row mb-3">
            <label for="inputId" class="col-sm-2 col-form-label">Id:</label>
            <div class="col-sm-10">
                @isset($admin)
                    {{ $admin->id }}
                @else
                    ---
                @endisset
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputCreated" class="col-sm-2 col-form-label">Vytvořeno:</label>
            <div class="col-sm-10">
                @isset($admin)
                    {{ $admin->created_at->format('d.m.Y H:i:s') }}
                @else
                    ---
                @endisset
            </div>
        </div>


        <div class="row mb-3">
            <label for="inputCreated" class="col-sm-2 col-form-label">Upraveno:</label>
            <div class="col-sm-10">
                @isset($admin)
                    {{ $admin->updated_at->format('d.m.Y H:i:s') }}
                @else
                    ---
                @endisset
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputName" class="col-sm-2 col-form-label">Jméno:</label>
            <div class="col-sm-10">
                <input type="text" name="name" value="@isset($admin) {{ $admin->name }}@endisset"
                       class="form-control @error('name') is-invalid @enderror"
                       id="inputName">
                @error('name')
                <div class="invalid-feedback">{{ \Illuminate\Support\Str::ucfirst($message) }}</div>
                @enderror
            </div>
        </div>


        <div class="row mb-3">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
                @isset($admin)
                    {{ $admin->email }}
                @else
                    <input type="email" name="email" value="" class="form-control @error('email') is-invalid @enderror"
                           id="inputEmail">
                    @error('email')
                    <div class="invalid-feedback">{{ \Illuminate\Support\Str::ucfirst($message) }}</div>
                    @enderror
                @endisset
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputActive" class="col-sm-2 col-form-label">Je aktivní:</label>
            <div class="col-sm-10">
                <div class="form-check form-switch">
                    <input type="hidden" name="active" value="0">
                    <input class="form-check-input" name="active"
                           @isset($admin) @if($admin->active) checked="checked" @endif @endisset type="checkbox"
                           role="switch" id="inputActive" value="1">
                </div>

            </div>
        </div>

        <div class="row mb-3">
            <label for="inputAdmin" class="col-sm-2 col-form-label">Je admin:</label>
            <div class="col-sm-10">
                <div class="form-check form-switch">
                    <input type="hidden" name="is_admin" value="0">
                    <input class="form-check-input" name="is_admin"
                           @isset($admin) @if($admin->is_admin) checked="checked" @endif @endisset type="checkbox"
                           role="switch" id="inputAdmin" value="1">
                </div>

            </div>
        </div>

        <div class="row mb-3">
            <label for="inputBarber" class="col-sm-2 col-form-label">Je barber:</label>
            <div class="col-sm-10">
                <div class="form-check form-switch">
                    <input type="hidden" name="is_barber" value="0">
                    <input class="form-check-input" @isset($admin) @if($admin->is_barber) checked="checked"
                           @endif @endisset name="is_barber" value="1" type="checkbox" role="switch" id="inputBarber">
                </div>

            </div>
        </div>

        <div class="row mb-3">
            <label for="inputNote" class="col-sm-2 col-form-label">Poznámka na webu:</label>
            <div class="col-sm-10">
                <input type="text" name="note" value="@isset($admin) {{ $admin->note }}@endisset"
                       class="form-control @error('note') is-invalid @enderror"
                       id="inputNote">
                @error('note')
                <div class="invalid-feedback">{{ \Illuminate\Support\Str::ucfirst($message) }}</div>
                @enderror

            </div>
        </div>

        <div class="row mb-3">
            <label for="inputPosition" class="col-sm-2 col-form-label">Řazení na webu:</label>
            <div class="col-sm-10">
                <input type="number" min="0" name="position"
                       @isset($admin)
                           value="{{ $admin->position }}"
                       @else
                           value="0"
                       @endisset
                       class="form-control @error('position') is-invalid @enderror"
                       id="inputPosition"
                       style="max-width: 80px">
                @error('position')
                <div class="invalid-feedback">{{ \Illuminate\Support\Str::ucfirst($message) }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputNewPassword" class="col-sm-2 col-form-label">Nové heslo:</label>
            <div class="col-sm-10">
                <input type="text" name="new_password" class="form-control @error('new_password') is-invalid @enderror"
                       id="inputNewPassword">
                @error('new_password')
                <div class="invalid-feedback">{{ \Illuminate\Support\Str::ucfirst($message) }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputFoto" class="col-sm-2 col-form-label">Foto:</label>
            <div class="col-sm-10">
                <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror"
                       id="inputFoto">
                @error('photo')
                <div class="invalid-feedback">{{ \Illuminate\Support\Str::ucfirst($message) }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3 mt-3">
            <div class="col-lg-4 admin-photo">
                @isset($admin)
                    <img class="mx-auto rounded-circle" src="{{ $admin->photo }}" alt="Admin photo">
                @else
                    <img class="mx-auto rounded-circle" src="{{ \App\Models\Admin::DEFAULT_PHOTO }}" alt="Admin photo">
                @endisset
            </div>

        </div>

        <div class="row mb-3">
            <div class="col">
                <button class="btn btn-success d-inline-block">@isset($admin)
                        Uložit
                    @else
                        Vytvořit
                    @endisset
                </button>
            </div>

        </div>
    </form>
@endsection

@section ('css')

@endsection

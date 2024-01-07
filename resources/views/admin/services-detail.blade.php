@extends ('admin.layout.base')

@section ('content')

    <form class="mt-3" method="post" enctype="multipart/form-data"
          action="@isset($service) {{ route('admin.post.services.update', ['service' => $service->id]) }} @else {{ route('admin.post.services.store') }} @endisset">
        {{ csrf_field() }}
        <div class="row mb-3">
            <label for="inputId" class="col-sm-2 col-form-label">Id:</label>
            <div class="col-sm-10">
                @isset($service)
                    {{ $service->id }}
                @else
                    ---
                @endisset
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputCreated" class="col-sm-2 col-form-label">Vytvořeno:</label>
            <div class="col-sm-10">
                @isset($service)
                    {{ $service->created_at->format('d.m.Y H:i:s') }}
                @else
                    ---
                @endisset
            </div>
        </div>


        <div class="row mb-3">
            <label for="inputCreated" class="col-sm-2 col-form-label">Upraveno:</label>
            <div class="col-sm-10">
                @isset($service)
                    {{ $service->updated_at->format('d.m.Y H:i:s') }}
                @else
                    ---
                @endisset
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputName" class="col-sm-2 col-form-label">Název:</label>
            <div class="col-sm-10">
                <input type="text" name="title" value="@isset($service) {{ $service->title }}@endisset"
                       class="form-control @error('title') is-invalid @enderror"
                       id="inputName">
                @error('name')
                <div class="invalid-feedback">{{ \Illuminate\Support\Str::ucfirst($message) }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputName" class="col-sm-2 col-form-label">Ikona:</label>
            <div class="col-sm-10">
                <div class="input-group mb-3 has-validation">
                    <span class="input-group-text">fas fa-</span>
                    <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon"
                           value="@isset($service){{ $service->icon }}@endisset">
                    @error('icon')
                    <div class="invalid-feedback">{{ \Illuminate\Support\Str::ucfirst($message) }}</div>
                    @enderror
                </div>
            </div>
        </div>


        <div class="row mb-3">
            <label for="inputActive" class="col-sm-2 col-form-label">Je aktivní:</label>
            <div class="col-sm-10">
                <div class="form-check form-switch">
                    <input type="hidden" name="active" value="0">
                    <input class="form-check-input" name="active"
                           @isset($service) @if($service->active) checked="checked" @endif @endisset type="checkbox"
                           role="switch" id="inputActive" value="1">
                </div>

            </div>
        </div>

        <div class="row mb-3">
            <label for="inputPosition" class="col-sm-2 col-form-label">Řazení na webu:</label>
            <div class="col-sm-10">
                <input type="number" min="0" name="position"
                       @isset($service)
                           value="{{ $service->position }}"
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
            <label for="inputDesc" class="col-sm-2 col-form-label">Popis:</label>
            <div class="col-sm-10">
                {{-- @formatter:off --}}
                <textarea name="desc" class="form-control @error('desc') is-invalid @enderror" id="inputDesc">@isset($service){{ $service->desc }}@endisset</textarea>
                @error('desc')
                <div class="invalid-feedback">{{ \Illuminate\Support\Str::ucfirst($message) }}</div>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <button class="btn btn-success d-inline-block">@isset($service)
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

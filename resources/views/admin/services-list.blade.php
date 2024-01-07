@extends ('admin.layout.base')

@section ('content')
    <div class="my-3">
        <a href="{{ route('admin.get.services.show', ['service' => 0]) }}" class="btn btn-sm btn-success">Přidat</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th style="width: 15px" scope="col" class="text-center">#</th>
                <th style="width: 10%" scope="col" class="text-center">Změněno</th>
                <th style="width: 50%" scope="col">Název</th>
                <th style="width: 10%" scope="col" class="text-center">Aktivní</th>
                <th style="width: 30%" scope="col" class="text-end">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($services as $service)
                <tr>
                    <td class="text-center">{{ $service->id }}</td>
                    <td class="text-center">{{ $service->updated_at->format('d.m.Y') }}</td>
                    <td>{{ $service->title }}</td>
                    <td class="text-center">
                        @if($service->active)
                            <i class="bi bi-check-lg"></i>
                        @else
                            <i class="bi bi-x-lg"></i>
                        @endif
                    </td>
                    <td class="text-end">
                        <a href="{{ route('admin.get.services.show', ['service' => $service->id]) }}"
                           class="btn btn-sm btn-info mx-1">Detail</a>
                        <a href="{{ route('admin.get.services.delete', ['service' => $service->id]) }}"
                           class="btn btn-sm btn-danger mx-1"
                           onclick="return confirm('Opravdu smazat službu {{ $service->title }}? Akce je nevratná!')">Smazat</a>
                    </td>
                </tr>
            @endforeach

            @empty($services)
                <tr>
                    <td colspan="7">
                        <div class="alert alert-secondary" role="alert">
                            Žádná data nenalezena
                        </div>
                    </td>
                </tr>
            @endempty
            </tbody>

        </table>
    </div>

@endsection

@section ('js')

@endsection

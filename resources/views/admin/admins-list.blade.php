@extends ('admin.layout.base')

@section ('content')
    <div class="my-3">
        <a href="{{ route('admin.get.admins.show', ['admin' => 0]) }}" class="btn btn-sm btn-success">Přidat</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th style="width: 15px" scope="col" class="text-center">#</th>
                <th style="width: 10%" scope="col" class="text-center">Změněno</th>
                <th style="width: 20%" scope="col">Jméno</th>
                <th style="width: 20%" scope="col">Email</th>
                <th style="width: 10%" scope="col" class="text-center">Aktivní</th>
                <th style="width: 10%" scope="col" class="text-center">Admin</th>
                <th style="width: 10%" scope="col" class="text-center">Barber</th>
                <th style="width: 30%" scope="col" class="text-end">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($admins as $admin)
                <tr>
                    <td class="text-center">{{ $admin->id }}</td>
                    <td class="text-center">{{ $admin->updated_at->format('d.m.Y') }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td class="text-center">
                        @if($admin->active)
                            <i class="bi bi-check-lg"></i>
                        @else
                            <i class="bi bi-x-lg"></i>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($admin->is_admin)
                            <i class="bi bi-check-lg"></i>
                        @else
                            <i class="bi bi-x-lg"></i>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($admin->is_barber)
                            <i class="bi bi-check-lg"></i>
                        @else
                            <i class="bi bi-x-lg"></i>
                        @endif
                    </td>
                    <td class="text-end">
                        <a href="{{ route('admin.get.admins.show', ['admin' => $admin->id]) }}"
                           class="btn btn-sm btn-info mx-1">Detail</a>
                        <a href="{{ route('admin.get.admins.delete', ['admin' => $admin->id]) }}"
                           class="btn btn-sm btn-danger mx-1"
                           onclick="return confirm('Opravdu smazat uživatele {{ $admin->name }}? Akce je nevratná!')">Smazat</a>
                    </td>
                </tr>
            @endforeach

            @empty($admins)
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

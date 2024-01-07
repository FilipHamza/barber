@extends ('admin.layout.base')

@section ('content')
    <div class="alert alert-warning" role="alert">
        @isset($message)
            {{ $message }}
        @else
            Nemáte oprávnění prohlížet tuto část administrace!
        @endisset
    </div>
@endsection

@section ('css')

@endsection

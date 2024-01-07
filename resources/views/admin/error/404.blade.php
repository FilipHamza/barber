@extends ('admin.layout.base')

@section ('content')
    <div class="alert alert-warning" role="alert">
        @isset($message)
            {{ $message }}
        @else
            Stránka neexistuje!
        @endisset
    </div>
@endsection

@section ('css')

@endsection

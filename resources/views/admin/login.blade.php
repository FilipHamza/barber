<!doctype html>
<html lang="cs">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    @vite(['resources/css/login.css', 'resources/css/app.css'])

</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">

<main class="form-signin w-100 m-auto">
    <form action="{{ route('admin.post.login') }}">
        {{ csrf_field() }}
        <h1 class="h3 mb-3 fw-normal">Přihlašte se</h1>

        <div class="form-floating">
            <input type="text" name="username" class="form-control" id="username" placeholder="name@example.com">
            <label for="username">Uživatel</label>
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="password" placeholder="Heslo">
            <label for="password">Heslo</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Přihlásit</button>
    </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>

    var form = document.querySelector('form');
    var username = document.querySelector('input[name=username]');
    var password = document.querySelector('input[name=password]');
    username.value = '';
    username.focus();

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        axios.post(form.getAttribute('action'), new FormData(form))
            .then(function (response) {
                if (response.data.system.code === 200) {
                    window.location.href = "{{ route('admin.get.home') }}";
                }
            })
            .catch(function (error) {
                Toastify({
                    text: "Chybné jméno nebo heslo",
                    duration: 3000,
                    newWindow: true,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    className: "error",
                }).showToast();

                password.value = '';
                password.focus();
            });
    }, false);


</script>
</body>
</html>


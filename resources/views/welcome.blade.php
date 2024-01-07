<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Cool Barber</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="/web/css/styles.css" rel="stylesheet"/>
    <style>
        .toastify.error {
            background: rgb(220, 53, 69);
            color: white;
        }

        .toastify.error .toast-close {
            color: white;
            font-family: initial;
        }
    </style>
</head>
<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#page-top"><img src="/web/assets/img/logo.png" alt="Logo"/></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="#services">Co děláme</a></li>
                <li class="nav-item"><a class="nav-link" href="#portfolio">Co tě čeká</a></li>
                <li class="nav-item"><a class="nav-link" href="#team">Kdo jsme</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Rezervace</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<header class="masthead">
    <div class="container">
        <div class="masthead-heading text-uppercase">Tradiční řemeslo, moderní styl</div>
        <a class="btn btn-primary btn-xl text-uppercase" href="#services">Objevujte</a>
    </div>
</header>
<!-- Services-->
<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Co děláme</h2>
            <h3 class="section-subheading text-muted">
                <div class="lh-lg">V našem útulném a stylově zařízeném prostředí se můžete ponořit do
                    světa profesionální péče o vlasy a vousy. Naši zkušení holiči jsou mistrům ve svém oboru a poskytují
                    širokou škálu služeb - od klasického holení po moderní úpravy účesů, vše přizpůsobené vašim
                    individuálním potřebám a přáním. Při návštěvě nášho salonu nejenže získáte skvělý vzhled, ale také
                    si
                    užijete relaxaci a příjemnou atmosféru.
                </div>
            </h3>
        </div>
        <div class="row text-center">
            @foreach($services as $service)
                <div class="col-md-4 p-3">
                    <div class="border p-3 h-100">
                    <span class="fa-stack fa-4x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-{{ $service->icon }} fa-stack-1x fa-inverse"></i>
                </span>
                        <h4 class="my-3">{{ $service->title }}</h4>
                        <p class="text-muted">{{ $service->desc }}</p>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Portfolio Grid-->
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Co tě čeká</h2>
            <h3 class="section-subheading text-muted">
                <div class="mb-2 lh-lg">Když vstoupíš do barber shopu, ocitneš se v prostředí, které kombinuje tradiční
                    řemeslo s moderním
                    stylem. První, co si všimneš, bude výrazný dekor: starožitné židle pro holení, elegantní zrcadla a
                    často
                    i vintage doplňky, které dotvářejí autentickou atmosféru. Barber shop je místem, kde se setkává
                    kultura,
                    umění a společenský život. Můžeš očekávat přátelský přístup, kde je každý zákazník vítán a oceňován.
                </div>

                <div class="lh-lg">Barbeři jsou mistři svého řemesla. Své služby nabízejí s důrazem na detail a kvalitu.
                    Můžeš se
                    těšit na
                    profesionální střih vlasů, precizní úpravu vousů nebo klasické holení žiletkou, doplněné o relaxační
                    masáž obličeje a pečující kosmetiku. Atmosféra je doplněna o pohodlné čekání, během kterého si můžeš
                    přečíst časopis, poslechnout si hudbu nebo si dát kávu. Návštěva barber shopu je nejen o úpravě
                    vzhledu,
                    ale i o zážitku, který ti nabídne chvíli relaxace a odpočinku od každodenního shonu.
                </div>

            </h3>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 1-->
                <div class="portfolio-item">
                    <div class="portfolio-link">
                        <img class="img-fluid" src="/web/assets/img/portfolio/1.jpg" alt="Barber shop"/>
                    </div>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Tradice snoubená se stylem</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 2-->
                <div class="portfolio-item">
                    <div class="portfolio-link">
                        <img class="img-fluid" src="/web/assets/img/portfolio/2.jpg" alt="Barber shop"/>
                    </div>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Přátelská, osobní atmosféra</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 3-->
                <div class="portfolio-item">
                    <d class="portfolio-link">
                        <img class="img-fluid" src="/web/assets/img/portfolio/3.jpg" alt="Barber shop"/>
                    </d>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Řemeslní mistři</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                <!-- Portfolio item 4-->
                <div class="portfolio-item">
                    <div class="portfolio-link">
                        <img class="img-fluid" src="/web/assets/img/portfolio/4.jpg" alt="Barber shop"/>
                    </div>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Únik od každodeního shonu</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                <!-- Portfolio item 5-->
                <div class="portfolio-item">
                    <div class="portfolio-link">
                        <img class="img-fluid" src="/web/assets/img/portfolio/5.jpg" alt="Barber shop"/>
                    </div>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Relaxační zážitek</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <!-- Portfolio item 6-->
                <div class="portfolio-item">
                    <div class="portfolio-link">
                        <img class="img-fluid" src="/web/assets/img/portfolio/6.jpg" alt="Barber shop"/>
                    </div>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">Profesionální úpravy vlasů</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-section bg-light" id="team">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Kdo jsme</h2>
            <h3 class="section-subheading text-muted">
                <div class="lh-lg">
                    V našem barber shopu jsme tým vášnivých profesionálů, kteří spojují klasické řemeslo holičství s
                    moderními trendy. Jsme místem, kde se tradice setkává se stylem a kvalita služeb je naší nejvyšší
                    prioritou. Každý z našich barberů je mistr svého řemesla, pečlivě vzdělaný a zkušený v nejrůznějších
                    technikách stříhání a úpravy vlasů a vousů. Naším posláním je poskytnout každému zákazníkovi nejen
                    dokonalou úpravu vzhledu, ale i nezapomenutelný zážitek a chvíle relaxace ve světě, kde se čas na
                    chvíli zpomalí. V našem barber shopu nejde jen o stříhání vlasů, jde o kulturu, o péči a o komunitní
                    zážitek, kde se každý cítí jako doma.
                </div>
            </h3>
        </div>
        <div class="row">
            @foreach($admins as $admin)
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="{{ $admin->photo }}" alt="{{ $admin->name }}"/>
                        <h4>{{ $admin->name }}</h4>
                        <p class="text-muted">{{ $admin->note }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Uvedené osoby jsou fiktivní. Jakákoliv
                    podobnost s reálnými osobami je čistě náhodná.</p></div>
        </div>
    </div>
</section>
<!-- Contact-->
<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Rezervace</h2>
            <h3 class="section-subheading text-muted">Vyber si službu a holiče</h3>
        </div>

        <form id="contactForm">
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" id="name" type="text" name="name" placeholder="Jméno">
                        <div class="invalid-feedback d-block">&nbsp;</div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="email" type="email" name="email" placeholder="Email">
                        <div class="invalid-feedback d-block">&nbsp;</div>
                    </div>
                    <div class="form-group mb-md-0">
                        <input class="form-control" id="phone" type="tel" name="phone" placeholder="Telefon">
                        <div class="invalid-feedback d-block">&nbsp;</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <select class="form-select" id="barber" name="barber">
                            <option value="0">--- vyberte holiče ---</option>
                            @foreach($admins as $admin)
                                <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback d-block">&nbsp;</div>
                    </div>

                    <div class="form-group">
                        <select class="form-select" id="service" name="service">
                            <option value="0">--- vyberte službu ---</option>
                            @foreach($services as $service)
                                <option value="{{ $service->id }}">{{ $service->title }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback d-block">&nbsp;</div>
                    </div>

                    <div class="d-flex align-items-start form-group">
                        <div class="form-group me-2 mb-0">
                            <input class="form-control" id="date" type="date" name="date" placeholder="Datum">
                            <div class="invalid-feedback d-block">&nbsp;</div>
                        </div>

                        <div class="no-time bg-danger text-white p-4 w-100 rounded d-none" id="no-time">Žádné volné
                            termíny
                        </div>

                        <select class="form-select d-none" id="time" name="time">
                        </select>
                    </div>
                </div>
            </div>

            <div id="text-success" class="bg-success text-white text-center p-4 mb-4 d-none">
                Rezervace odeslána
            </div>
            <div class="text-center">
                <button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">
                    Rezervovat
                </button>
            </div>
        </form>
    </div>
</section>


<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="/web/js/scripts.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>

    function clearForm() {
        document.getElementById('name').value = '';
        document.getElementById('email').value = '';
        document.getElementById('phone').value = '';
        document.getElementById('service').value = '0';
        document.getElementById('barber').value = '0';
        document.getElementById('date').value = '';
        document.getElementById('time').classList.add('d-none');
        document.getElementById('no-time').classList.add('d-none');
    }

    function checkAvailability(e) {
        var form = document.getElementById('contactForm');
        var barber = document.getElementById('barber').value;
        var date = document.getElementById('barber');

        if (!date.value) {
            document.getElementById('time').classList.add('d-none');
            document.getElementById('no-time').classList.add('d-none');
            return;
        }

        if (barber === '0') {
            Toastify({
                text: "Musíte nejprve vybrat holiče.",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top",
                position: "right",
                stopOnFocus: true,
                className: "error",
            }).showToast();

            return;
        }

        axios.post('/availability', new FormData(form))
            .then(function (response) {
                if (response.data.system.code === 200) {
                    if (!response.data.data) {
                        document.getElementById('time').classList.add('d-none');
                        document.getElementById('no-time').innerHTML = response.data.system.message;
                        document.getElementById('no-time').classList.remove('d-none');

                    } else {
                        if (response.data.data.length === 0) {
                            document.getElementById('time').classList.add('d-none');
                            document.getElementById('no-time').innerHTML = response.data.system.message;
                            document.getElementById('no-time').classList.remove('d-none');
                        } else {
                            let content = '<option value="">--- vyberte čas ---</option>';
                            for (let i = 0; i < response.data.data.length; i++) {
                                content += '<option value="' + response.data.data[i] + '">' + response.data.data[i] + ':00</option>';
                            }

                            document.getElementById('time').innerHTML = content;
                            document.getElementById('time').classList.remove('d-none');
                            document.getElementById('no-time').classList.add('d-none');
                        }
                    }
                }
            })
            .catch(function (error) {
                Toastify({
                    text: "Nelze ověřit dostupnost holiče. Prosím, zavolejte nám.",
                    duration: 3000,
                    newWindow: true,
                    close: true,
                    gravity: "top",
                    position: "right",
                    stopOnFocus: true,
                    className: "error",
                }).showToast();
            });
    }

    if (document.getElementById('barber').value !== '' && document.getElementById('barber').value != 0 && document.getElementById('date').value !== '') {
        checkAvailability()
    }

    document.getElementById('contactForm').addEventListener('submit', function (e) {
        e.preventDefault();

        let elements = e.target.querySelectorAll(['.is-invalid']);
        for (let i = 0; i < elements.length; i++) {
            elements[i].classList.remove('is-invalid');
            let div = elements[i].closest('.form-group').querySelector('.invalid-feedback');
            if (div) {
                div.innerHTML = '&nbsp;';
            }
        }

        axios.post('/reservation', new FormData(e.target))
            .then(function (response) {
                if (response.data.system.code === 200) {
                    document.getElementById('text-success').classList.remove('d-none');
                    clearForm();
                    Toastify({
                        text: "Rezervace odeslána",
                        duration: 3000,
                        newWindow: true,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        className: "success",
                    }).showToast();
                }

                if (response.data.system.code === 422) {
                    let element = e.target.querySelector('[name="date"]');
                    if (element) {
                        element.classList.add('is-invalid');
                        let div = element.closest('.form-group').querySelector('.invalid-feedback');
                        if (div) {
                            div.innerHTML = response.data.system.message;
                        }
                    }
                }
            })
            .catch(function (error) {
                if (error.response.status === 422) {
                    console.log(error.response.data.errors);
                    for (const [key, value] of Object.entries(error.response.data.errors)) {
                        if (key === 'time' && document.getElementById('time').classList.contains('d-none')) {
                            // co delat kdyz neni selectobx videt
                        }
                        let element = e.target.querySelector('[name="' + key + '"]');
                        if (element) {
                            element.classList.add('is-invalid');
                            let div = element.closest('.form-group').querySelector('.invalid-feedback');
                            if (div) {
                                div.innerHTML = value[0];
                            }
                        }
                    }
                } else {
                    Toastify({
                        text: "Formulář se nepodařilo odeslat. Prosím, zavolejte nám.",
                        duration: 3000,
                        newWindow: true,
                        close: true,
                        gravity: "top",
                        position: "right",
                        stopOnFocus: true,
                        className: "error",
                    }).showToast();
                }
            });
    }, false);

    document.getElementById('date').addEventListener('input', function () {
        checkAvailability();
    }, false);

    document.getElementById('barber').addEventListener('input', function () {
        checkAvailability();
    }, false);


</script>
</body>
</html>

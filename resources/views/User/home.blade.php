<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Home</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/vue.min.js') }}"></script>
    <script type="text/javascript"
            src='https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_API_KEY') }}&sensor=false&libraries=places'></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/4.4.95/css/materialdesignicons.min.css"
          rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/theme.css')}}">
</head>
<body>
<section id="app">
<div id="home_view_wrapper">
    {{--home 1st page--}}
    <header class="header" style="background-image: url('{{asset('images/home-img/home-bg.png')}}')">
        <div class="overlay"></div>
        <div class="container">
            <section class="navigation-bar">
                <nav class="navbar navbar-default nav-transparent nav-padding">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand brand-custom" href="{{ url('/') }}"><img src="{{asset('images/home-img/w-logo.png')}}"
                                                                               alt=""></a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li><a href="#">Spedisci</a></li>
                                <li><a href="#">Traccia</a></li>
                                <li><a href="{{route('register')}}">Registrati</a></li>
                            </ul>
                            <div class="navbar-form navbar-right">
                                <a class="btn btn-login" href="{{route('login')}}">Login</a>
                            </div>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </section>
        </div>
        <div class="w-bar"></div>
        <div class="container">
            <section class="home-body">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="home-text-wrapper">
                            <div class="tick-logo">
                                <img src="{{asset('images/home-img/h-tick.png')}}" alt="">
                            </div>
                            <div class="home-text">
                                <div class="h-text-1">Confronta e prenota servizi di spedizioni a basso costo con
                                    TiSpedisco
                                </div>
                                <div class="h-text-2">Ovunque nel mondo tu voglia inviare il tuo pacco, confrontiamo i
                                    migliori corrieri per offrirti i migliori servizi e tariffe di consegna.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="float-right home-w-90">
                            <div class="box-wrapper">
                                <div class="home-box">
                                    <div class="b-text-1 text-green">Calcola il tuo preventivo</div>
                                    <form action="{{ route('ship-comparator.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group margin-btm-input">
                                            <div class="input-group">
                                                <div class="input-group-addon home-input-group"><i
                                                        class="mdi mdi-md mdi-map-marker"></i></div>
                                                <input type="text" class="form-control home-input"
                                                       id="autocomplete-input-from"
                                                       placeholder="Cerca il luogo di partenza" name="from" required>
                                            </div>
                                        </div>
                                        <div class="form-group margin-btm-input">
                                            <div class="input-group">
                                                <div class="input-group-addon home-input-group"><i
                                                        class="mdi mdi-md mdi-map-marker-outline"></i></div>
                                                <input type="text" class="form-control home-input"
                                                       id="autocomplete-input-to"
                                                       placeholder="Cerca il luogo di destinazione..." name="to" required>
                                            </div>
                                        </div>
                                        <div class="form-group margin-btm-input">
                                            <div class="input-group">
                                                <div class="input-group-addon home-input-group"><i
                                                        class="mdi mdi-md mdi-view-dashboard"></i></div>
                                                <input type="text" class="form-control home-input"
                                                       placeholder="Inserisci il peso..." name="size" required>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="form-group">
                                                <input class="form-check-input styled-checkbox" type="checkbox" value=""
                                                       id="check-input" required>
                                                <label for="check-input"> <span class="form-check-label font-responsive text-black"> Accetto la privacy policy del sito web</span></label>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="form-group">
                                                <button class="btn btn-home-box">Calcola il costo della spedizione
                                                    <span class="btn-logo"><i
                                                            class="mdi mdi-md mdi-chevron-right"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </header>
    {{--home 1st page end--}}
    {{--home 2st page--}}
    <section class="gallery-wrapper">
        <div class="container">
            <div class="g-text-1">Come funziona TiSpedisco?</div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="owl-carousel owl-theme">
                        <div class="img-box-wrapper">
                            <div class="img-box"></div>
                        </div>
                        <div class="img-box-wrapper">
                            <div class="img-box"></div>
                        </div>
                        <div class="img-box-wrapper">
                            <div class="img-box"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-12 text-center">
                    <button class="btn btn-success margin-top-botton-5">Calcola preventivo</button>
                    <button class="btn btn-outline-success margin-top-botton-5">Maggiori informazioni</button>
                </div>
            </div>
            <div class="g-text-2">Collega il tuo ecommerce</div>
            <div class="row">
                <div class="col-12">
                    <div class="company-box-wrapper">
                        <img src="{{asset('images/home-img/company-logo.png')}}" class="company-box">
                    </div>
                </div>
            </div>
            <div class="g-text-3">Cosa dicono di noi</div>
            <div class="comment-wrapper">
                <div class="owl-carousel owl-theme">
                    <div class="comment-box">
                        <div class="text-center">
                            <img class="comment-img" src="{{asset('images/home-img/round_headshot.png')}}" alt="">
                            <div class="comment-img-text">Lorem ipsum dolor sit</div>
                            <img src="{{asset('images/home-img/star.png')}}" class="star" alt="">
                        </div>
                        <div class="comment-logo">"</div>
                        <div class="comment-text">Cras sagittis tincidunt ante nec posuere. Maecenas porta porttitor elit a suscipit. Vivamus vel
                            libero dignissim, vestibulum nibh maximus, molestie dolor. Sed rutrum mattis enim quis auctor…
                        </div>
                        <div class="comment-logo text-right">"</div>
                    </div>
                    <div class="comment-box">
                        <div class="text-center">
                            <img class="comment-img" src="{{asset('images/home-img/round_headshot.png')}}" alt="">
                            <div class="comment-img-text">Lorem ipsum dolor sit</div>
                            <img src="{{asset('images/home-img/star.png')}}" class="star" alt="">
                        </div>
                        <div class="comment-logo">"</div>
                        <div class="comment-text">Cras sagittis tincidunt ante nec posuere. Maecenas porta porttitor elit a suscipit. Vivamus vel
                            libero dignissim, vestibulum nibh maximus, molestie dolor. Sed rutrum mattis enim quis auctor…
                        </div>
                        <div class="comment-logo text-right">"</div>
                    </div>
                    <div class="comment-box">
                        <div class="text-center">
                            <img class="comment-img" src="{{asset('images/home-img/round_headshot.png')}}" alt="">
                            <div class="comment-img-text">Lorem ipsum dolor sit</div>
                            <img src="{{asset('images/home-img/star.png')}}" class="star" alt="">
                        </div>
                        <div class="comment-logo">"</div>
                        <div class="comment-text">Cras sagittis tincidunt ante nec posuere. Maecenas porta porttitor elit a suscipit. Vivamus vel
                            libero dignissim, vestibulum nibh maximus, molestie dolor. Sed rutrum mattis enim quis auctor…
                        </div>
                        <div class="comment-logo text-right">"</div>
                    </div>
                </div>
            </div>
            <div class="video-wrapper">
                <div class="video-img" style="background-image: url('{{asset('images/home-img/bg-video.png')}}')">
                    <img src="{{asset('images/home-img/play.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>
    {{--home 2st page end--}}
    {{--footer--}}
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-xs-12">
                    <ul class="list-unstyled footer-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Spedisci un pacco</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Traccia un pacco</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Aiuto</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Preferenze</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Ricerca nel sito</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 col-xs-12">
                    <ul class="list-unstyled footer-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Chi siamo</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Spedizioni internazionali</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Spedizioni aziende</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Consegna pacchi internazionale</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Il nostro blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Termini e condizioni</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-7 col-xs-12">
                    <div class="card">
                        <p class="card-text-1">Iscriviti alla newsletter e ricevi un buono sconto di 5€ sul primo ordine</p>
                        <form data-form-email novalidate action="/forms/mailchimp.php">
                            <div class="d-flex form-group ">
                                <input class="form-control custom-input" name="email" placeholder="Il tuo indirizzo email" type="email" required>
                                <div class="custom-control custom-checkbox">
                                    <input class="form-check-input styled-checkbox-footer" type="checkbox" value=""
                                           id="check-input-footer" required>
                                    <label for="check-input-footer" class="form-check-label text-white"> Dichiaro di aver letto e di accettare laa <a href="#">Privacy Policy</a></label>
                                    {{--                                    <label class="form-check-label text-white">--}}
                                    {{--                                        --}}
                                    {{--                                    </label>--}}
                                </div>
                                <button type="submit" class="btn btn-green-outline btn-loading" data-loading-text="Sending">
                                    <!-- Icon for loading animation -->
                                    {{--                                    <svg class="icon bg-white" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">--}}
                                    {{--                                        <title>Icon For Loading</title>--}}
                                    {{--                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
                                    {{--                                            <g>--}}
                                    {{--                                                <polygon points="0 0 24 0 24 24 0 24" opacity="0"></polygon>--}}
                                    {{--                                            </g>--}}
                                    {{--                                            <path d="M12,4 L12,6 C8.6862915,6 6,8.6862915 6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,10.9603196 17.7360885,9.96126435 17.2402578,9.07513926 L18.9856052,8.09853149 C19.6473536,9.28117708 20,10.6161442 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,7.581722 7.581722,4 12,4 Z"--}}
                                    {{--                                                  fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 12.000000) scale(-1, 1) translate(-12.000000, -12.000000) "></path>--}}
                                    {{--                                        </g>--}}
                                    {{--                                    </svg>--}}
                                    <span>Invia</span>
                                </button>
                            </div>
                            <div data-recaptcha data-sitekey="INSERT_YOUR_RECAPTCHA_V2_SITEKEY_HERE" data-size="invisible" data-badge="bottomleft"></div>
                            {{--                            <div class="d-none alert alert-success w-100" role="alert" data-success-message>--}}
                            {{--                                Thanks, a member of our team will be in touch shortly.--}}
                            {{--                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                            {{--                            </div>--}}
                            {{--                            <div class="d-none alert alert-danger w-100" role="alert" data-error-message>--}}
                            {{--                                Please fill all fields correctly.--}}
                            {{--                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                            {{--                            </div>--}}
                            <div class="text-small text-muted">La tua privacy è al sicuro</div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <hr style="border-color: rgba(255, 255, 255, 0.1);">
                </div>
            </div>
            <div class="row flex-column flex-lg-row align-items-center justify-content-center justify-content-lg-between text-center text-lg-left">
                <div class="col-auto">
                    <div class="text-left">
                        <div class="text-muted footer-text">&copy; 2019 TiSpedisco | A TranService Company - vat IT123456789 - REA LC-124577 | <a href="" target="_blank">Privacy Policy</a> - <a href="" target="_blank">Cookie Policy</a> - <a href="" target="_blank">Reclami</a> - <a href="" target="_blank">Termini e Condizioni</a><br/>
                            Tutti i testi e la grafica presenti nel sito sono soggetti alle norme vigenti in materia di diritto d'autore.
                        </div>
                    </div>
                </div>
                <div class="payments">
                    <img src="{{asset('images/home-img/payments.png')}}" >
                </div>
            </div>
        </div>
    </footer>
    {{--footer emd--}}

</div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
{{--<script src="{{ asset('js/slick.js') }}" type="text/javascript" charset="utf-8"></script>--}}
<script>
    // Slick slider initialization

    /*owl*/
    /*owl*/
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    new Vue({
        el: '#home_view_wrapper',
        data: {
            step: 1,
            errors: [],
            success: null,
            autocomplete_from: null,
            autocomplete_to: null,
            weight: null,
            width: null,
            height: null,
            depth: null,
            ref: null,
            envelope: {
                weight: null,
                reference: null,
            },
            location_from: {
                formatted_address: null,
                lat: null,
                long: null,
            },
            location_to: {
                formatted_address: null,
                lat: null,
                long: null,
            },
        },
        methods: {
            generateAutoCompleteFrom: function () {
                let _this = this;
                let from = document.getElementById('autocomplete-input-from');
                this.autocomplete_from = new google.maps.places.Autocomplete(from, {types: ['geocode']});
                this.autocomplete_from.addListener('place_changed', function () {
                    let place = _this.autocomplete_from.getPlace();
                    _this.location_from.formatted_address = place.formatted_address;
                    _this.location_from.lat = place.geometry.location.lat();
                    _this.location_from.long = place.geometry.location.lng();
                })
            },
            generateAutoCompleteTo: function () {
                let _this = this;
                this.autocomplete_to = new google.maps.places.Autocomplete(document.getElementById('autocomplete-input-to'), {types: ['geocode']});
                this.autocomplete_to.addListener('place_changed', function () {
                    let place = _this.autocomplete_to.getPlace();
                    _this.location_to.formatted_address = place.formatted_address;
                    _this.location_to.lat = place.geometry.location.lat();
                    _this.location_to.long = place.geometry.location.lng();
                })
            },
        },
        mounted() {
            this.generateAutoCompleteFrom();
            this.generateAutoCompleteTo();
        },
        created() {
            // $('.owl-carousel').owlCarousel({
            //     margin:10,
            //     responsiveClass:true,
            //     responsive:{
            //         0:{
            //             items:1,
            //         },
            //         768:{
            //             items:1,
            //         },
            //         1000:{
            //             items:3,
            //         },
            //     }
            // });
        }
    });
</script>

</body>
</html>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Home</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/vue.min.js') }}"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/4.4.95/css/materialdesignicons.min.css"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/theme.css')}}">
</head>
<body>
<div>
    <div class="login-user">
        <div class="back-img"><img src="{{asset('images/home-img/login-bg.png')}}" alt=""></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-flex">
                        <div class="form-box">
                            <div class="logo-green text-center">
                                <img src="{{asset('images/home-img/logo-green.png')}}" alt="">
                            </div>
                            <div class="margin-30"></div>
                            <div class="margin-30"></div>
                            <div class="pass-box">
                                Prima di procedere, controlla la tua e-mail per un link di verifica.
                                Se non hai ricevuto l'email, 
                                <a href="{{ route('verification.resend') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('resend-confirmation').submit();"> clicca qui per richiederne un altro
                                </a>.
                                <form id="resend-confirmation" action="{{ route('verification.resend') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                            
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    Un nuovo link di verifica è stato inviato al tuo indirizzo email.
                                </div>
                            @endif
                            <div class="margin-30"></div><div class="margin-30"></div>
                            <div class="form-group text-center">
                                <a class="btn btn-outline-success btn-padding-65" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Disconnettersi
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    new Vue({
        el: '#home_view_wrapper',
        data: {
            state: 4,
            tabActive: 4,
            rangeValue: 0
        },
        methods: {
            ChangeState: function (state) {
                this.state = state;
                this.tabActive = state;
            }
        },
    });
</script>


</body>
</html>
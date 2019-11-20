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
        <div class="back-img">
            <img src="{{asset('images/home-img/register-bg.png')}}" alt="">
        </div>
        <div class="container padding-top-responsive">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-flex">
                        <div class="form-box">
                            <div class="logo-green text-center">
                                <a href="{{ url('/') }}"> <img src="{{asset('images/home-img/logo-green.png')}}" alt=""></a>
                            </div>
                            <div class="margin-30"></div>
                            <div class="margin-30"></div>
                            <div class="pass-box">
                                <div class="pass-text-1">Registrati</div>
                                <div class="pass-text-2">Crea il tuo account</div>                                
                                <form method="POST" action="{{ route('register') }}" id="registerForm">
                                    @csrf
                                    <div class="form-group margin-btm-input-lg">
                                        <div class="input-group mb-1 @error('first_name') has-danger @enderror">
                                            <div class="input-group-addon input-white home-input-group">
                                                <i class="mdi text-ash mdi-md mdi-account-circle"></i>
                                            </div>
                                            <input type="text" class="form-control input-white home-input" placeholder="Il tuo nome"
                                                id="first_name" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name">
                                        </div>
                                        @error('first_name')
                                            <small class="text-red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group margin-btm-input-lg">
                                        <div class="input-group mb-1 @error('last_name') has-danger @enderror">
                                            <div class="input-group-addon input-white home-input-group">
                                                <i class="mdi text-ash mdi-md mdi-account-circle"></i>
                                            </div>
                                            <input type="text" class="form-control input-white home-input" placeholder="Cognome"
                                                id="last_name" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">
                                        </div>
                                        @error('last_name')
                                            <small class="text-red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group margin-btm-input-lg">
                                        <div class="input-group mb-1 @error('email') has-danger @enderror">
                                            <div class="input-group-addon input-white home-input-group">
                                                <i class="mdi text-ash mdi-md mdi-email"></i>
                                            </div>
                                            <input type="email" class="form-control input-white home-input" placeholder="Indirizzo email" 
                                                id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        </div>
                                        @error('email')
                                            <small class="text-red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group margin-btm-input-lg">
                                        <div class="input-group mb-1 @error('password') has-danger @enderror">
                                            <div class="input-group-addon input-white home-input-group">
                                                <i class="mdi text-ash mdi-md mdi-lock"></i>
                                            </div>
                                            <input type="password" class="form-control input-white home-input"
                                                placeholder="Scegli una password" id="password" name="password" required autocomplete="new-password">                                            
                                        </div>
                                        @error('password')
                                            <small class="text-red">{{ $message }}</small>
                                            <br>
                                        @enderror
                                        <small class="text-green">La password deve essere composta da almeno 8 caratteri</small>
                                    </div>
                                    <div class="form-group margin-btm-input-lg">
                                        <div class="input-group mb-1">
                                            <div class="input-group-addon input-white home-input-group"><i
                                                        class="mdi text-ash mdi-md mdi-lock"></i></div>
                                            <input type="password" class="form-control input-white home-input" placeholder="Ripeti la password" 
                                                id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="form-group d-table">
                                        <span class="toggle-logo">
                                            <label class="switch">
                                                <input type="checkbox" checked name="is_subscribed" id="is_subscribed">
                                                <span class="slider round"></span>
                                            </label>
                                        </span>

                                        <label class="form-check-label login-toggle-check text-black">
                                            <span class="font-400">Desidero ricevere occasionalmente comunicazioni di marketing tramite e-mail</span>
                                        </label>
                                    </div>
                                    <div class="form-group d-table">
                                        <span class="toggle-logo">
                                            <label class="switch">
                                                <input type="checkbox" {{ old('accept_terms') ? 'checked' : '' }} name="accept_terms" id="accept_terms">
                                                <span class="slider round"></span>
                                            </label>
                                        </span>
                                        <label class="form-check-label login-toggle-check text-black">
                                            <span class="font-400">Dichiaro di aver letto e di accettare tutti i punti dei <a
                                                        href="#" class="text-green">Termini e Condizioni</a></span>
                                            @error('accept_terms')
                                                <br>
                                                <small class="text-red">{{ $message }}</small>
                                            @enderror
                                        </label>
                                    </div>
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-success btn-padding-65">Registrati</button>
                                    </div>
                                </form>
                            </div>
                            <div class="margin-30"></div>
                            <div class="text-center">
                                <small><a href="{{ route('login') }}" class="text-green text-center text-unstyle">Hai già un account? Entra!</a></small>
                            </div>
                            <div class="margin-30"></div>
                            <div class="form-group text-center">
                                <a class="btn btn-outline-success btn-padding-65" href="{{ url('/') }}">Torna alla Home</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
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
    $(document).ready(function () {
        $('#registerForm').on('submit', function(e) {
            var atLeastOneIsChecked = $('input[name="accept_terms"]:checked').length;
            if (atLeastOneIsChecked) 
                return true;
                swal({
                    icon: 'warning',
                    title: 'Read the terms first!', 
                    timer: 2000,
                    text: 'Read the terms and conditions first!'
                });
            e.preventDefault();
        })
    })
</script>


</body>
</html>
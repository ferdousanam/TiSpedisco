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
                                <div class="pass-text-1">Ripristina</div>
                                <div class="pass-text-2">Accedi al tuo account</div>
                                
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    
                                    <div class="form-group margin-btm-input-lg">
                                        <div class="input-group mb-1 @error('email') has-danger @enderror">
                                            <div class="input-group-addon input-white home-input-group">
                                                <i class="mdi text-ash mdi-md mdi-email"></i>
                                            </div>
                                            <input type="email" class="form-control input-white home-input" placeholder="Indirizzo email" 
                                                id="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email">
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
                                    <div class="form-group text-center">
                                        <button type="submit" class="btn btn-success btn-padding-65">Accedie</button>
                                    </div>
                                </form>
                            </div>
                            <div class="margin-30"></div><div class="margin-30"></div>
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
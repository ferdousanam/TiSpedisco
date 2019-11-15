<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Home</title>

    <!-- Scripts -->
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.3/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('css/theme.css')}}">
</head>
<body>
<div id="home_view_wrapper">
    {{--headerpage--}}
    @include('User.global.header')
    {{--header end--}}
    {{--inner page--}}
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="page-text">Risultati della ricerca</div>
                    <div class="page-sub-text">Da {{ $locations['from'] }} a {{ $locations['to'] }} -
                        Peso: {{ $locations['size'] }}kg
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-right pt-30 text-sm text-green ">
                        <span><i class="mdi mdi-email-outline"></i></span> &nbsp;&nbsp; <span>Condividi questo preventivo</span>
                    </div>
                </div>
            </div>
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="comparator-box">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group margin-0 position-relative">
                                                <select name="" id=""
                                                        class="select2 form-control profile-input input-gray">
                                                    <option value="">Filtra i risultati del preventivo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group margin-0 position-relative">
                                                <select name="" id=""
                                                        class="select2 form-control profile-input input-gray">
                                                    <option value="">Ordina i risultati del preventivoo</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="margin-30"></div>
{{--                        {{ dd($carriers) }}--}}
                        @foreach($carriers as $carrier)
                            <div class="company-comparator-box-wrapper">
                                <div class="box-header"></div>
                                <div class="box-body">
                                    <div class="box-1">
                                        <div class="c-info">preferito</div>
                                        <div class="c-logo">
                                            <img src="{{asset($carrier->logo)}}" alt="">
                                        </div>
                                    </div>
                                    <div class="box-2">
                                        <div class="text-xs font-bold">{{ $carrier->title }}</div>
                                        <div>Tra 1 e 2 giorni di consegna</div>
                                    </div>
                                    <div class="box-3">
                                        <div class="text-xs font-bold">Ritirato da casa o dal luogo di lavoro</div>
                                        <div>Consegnato a casa o sul luogo di lavoro</div>
                                    </div>
                                    <div class="box-4">
                                        <i class="mdi mdi-printer text-xl text-black"></i>
                                    </div>
                                    <div class="box-4">
                                        <i class="mdi mdi-information-outline text-xl text-black"></i>
                                    </div>
                                    <div class="box-5">
                                        <div class="text-box text-left">
                                            <div class="text-xs font-bold"> {{ $carrier->rates->first()->price }}€</div>
                                            <div>29,23 € Inc. IVA</div>
                                        </div>
                                        <div class="btn-box">
                                            <button class="btn bg-white text-green btn-c carrier" data-id="15">Prenota
                                            </button>
                                        </div>
                                    </div>
                                    <div class="full-box">
                                        <div class="sec-30">
                                       <span style="color: goldenrod">
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                        </span>
                                            <span>(89 recensioni)</span>
                                        </div>
                                        <div class="sec-70">
                                            <i class="mdi mdi-bullseye"></i>&nbsp;&nbsp; <span>Copertura assicurativa opzionale disponibile fino a un valore di 1.000,00 €.</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                        <div class="company-comparator-box-wrapper">
                            <div class="box-header"></div>
                            <div class="box-body">
                                <div class="box-1">
                                    <div class="c-info">preferito</div>
                                    <div class="c-logo">
                                        <img src="{{asset('images/home-img/c-logo-1.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="box-2">
                                    <div class="text-xs font-bold">Bartolini Standard</div>
                                    <div>Tra 1 e 2 giorni di consegna</div>
                                </div>
                                <div class="box-3">
                                    <div class="text-xs font-bold">Ritirato da casa o dal luogo di lavoro</div>
                                    <div>Consegnato a casa o sul luogo di lavoro</div>
                                </div>
                                <div class="box-4">
                                    <i class="mdi mdi-printer text-xl text-black"></i>
                                </div>
                                <div class="box-4">
                                    <i class="mdi mdi-information-outline text-xl text-black"></i>
                                </div>
                                <div class="box-5">
                                    <div class="text-box text-left">
                                        <div class="text-xs font-bold">24,36 €</div>
                                        <div>29,23 € Inc. IVA</div>
                                    </div>
                                    <div class="btn-box">
                                        <button class="btn bg-white text-green btn-c">Prenota</button>
                                    </div>
                                </div>
                                <div class="full-box">
                                    <div class="sec-30">
                                        <span style="color: goldenrod">
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                            <i class="mdi mdi-star"></i>
                                        </span>
                                        <span>(89 recensioni)</span>
                                    </div>
                                    <div class="sec-70">
                                        <i class="mdi mdi-bullseye"></i>&nbsp;&nbsp; <span>Copertura assicurativa opzionale disponibile fino a un valore di 1.000,00 €.</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--inner page end--}}

    {{--footer--}}
    @include('User.global.footer')
    {{--footer emd--}}

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.3/flatpickr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<script>
    $(".check_in").flatpickr({
        defaultDate: 'today',
        minDate: 'today',
        altInput: true,
        altFormat: 'F j, Y'
    });
    $(".select2").select2({});

    $('.carrier').click(function (e) {
        e.preventDefault();
        let carrier_id = $(this).attr('data-id');
        localStorage.setItem('carrier_id', carrier_id);
    })
</script>
<script>


    new Vue({
        el: '#home_view_wrapper',
        data: {},
        methods: {},
    });
</script>

</body>
</html>


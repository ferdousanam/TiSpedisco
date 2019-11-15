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
    <link rel="stylesheet" href="{{asset('css/theme.css')}}">
</head>
<body>
<div id="home_view_wrapper">
    {{--headerpage--}}
    @include('User.global.header')
    {{--header end--}}
    {{--inner page--}}
    <div class="page-content paddint-top-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="d-none alert alert-danger w-100" role="alert">
                        Completa tutti i campi prima di continuare
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="page-text">Calcolo della spedizione</div>
                    <div class="page-sub-text">Fornisci ulteriori dettagli per avere un prezzo della spedizione accurata</div>
                </div>
            </div>
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-9">
                        <div class="text-xl"><strong>Spezione per Uff|</strong></div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-xs mb-1"><strong> Data per il ritiro</strong></div>
                        <div class="position-relative">
                            <div class="form-group">
                                <input class="form-control input-gray check_in" type="text" name="start_date" required>
                            </div>
                            <span class="calender-down"><i class="mdi mdi-chevron-down"></i></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group margin-btm-input-lg">
                            <div class="mb-1">
                                <label for="">Dimensioni</label>
                                <input type="text" class="form-control input-gray profile-input"
                                       placeholder="Lunghezza">
                            </div>
                        </div>
                        <div class="form-group margin-btm-input-lg">
                            <div class="mb-1">
                                <input type="text" class="form-control input-gray profile-input"
                                       placeholder="Lunghezza">
                            </div>
                        </div>
                        <div class="form-group margin-btm-input-lg">
                            <div class="mb-1">
                                <label for="">Valore della merce</label>
                                <input type="text" class="form-control input-gray profile-input"
                                       placeholder="€">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group margin-btm-input-lg">
                            <div class="mb-1">
                                <label for="">&nbsp;</label>
                                <input type="text" class="form-control input-gray profile-input"
                                       placeholder="Altezza">
                            </div>
                        </div>
                        <div class="form-group margin-btm-input-lg">
                            <div class="mb-1">
                                <input type="text" class="form-control input-gray profile-input"
                                       placeholder="Peso">
                            </div>
                        </div>
                        <div class="form-group margin-btm-input-lg">
                            <div class="mb-1">
                                <label for="">Servizi aggiuntivi</label>
                                <select  class="form-control custom-select input-gray profile-input" name="" id="">
                                    <option value="">Assicurazione - 5€</option>
                                    <option value="">Assicurazione - 5€</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group margin-btm-input-lg">
                            <div class="mb-1">
                                <label for="">Contenuto</label>
                                <textarea name="" id="" cols="30" rows="9" class="form-control custom-select input-gray profile-input" placeholder="Descrivi il contenuto che desideri spedire"></textarea>
                                <small class="text-ash">*Consulta l'elenco delle restrizioni</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-divider"></div>
                <div class="row">
                    <div class="margin-30"></div>
                    <div class="margin-15"></div>
                    <div class="col-md-12">
                        <div class="text-xl text-ash"><strong>Assegna un nome alla spedizione</strong></div>
                    </div>
                </div>
                <div class="row">
                    <div class="margin-30"></div>
                    <div class="col-md-3">
                        <div class="form-group margin-btm-input-lg">
                            <div class="mb-1">
                                <label for="">Dimensioni</label>
                                <input type="text" class="form-control input-gray profile-input"
                                       placeholder="Lunghezza">
                            </div>
                        </div>
                        <div class="form-group margin-btm-input-lg">
                            <div class="mb-1">
                                <input type="text" class="form-control input-gray profile-input"
                                       placeholder="Lunghezza">
                            </div>
                        </div>
                        <div class="form-group margin-btm-input-lg">
                            <div class="mb-1">
                                <label for="">Valore della merce</label>
                                <input type="text" class="form-control input-gray profile-input"
                                       placeholder="€">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group margin-btm-input-lg">
                            <div class="mb-1">
                                <label for="">&nbsp;</label>
                                <input type="text" class="form-control input-gray profile-input"
                                       placeholder="Altezza">
                            </div>
                        </div>
                        <div class="form-group margin-btm-input-lg">
                            <div class="mb-1">
                                <input type="text" class="form-control input-gray profile-input"
                                       placeholder="Peso">
                            </div>
                        </div>
                        <div class="form-group margin-btm-input-lg">
                            <div class="mb-1">
                                <label for="">Servizi aggiuntivi</label>
                                <select  class="form-control custom-select input-gray profile-input" name="" id="">
                                    <option value="">Assicurazione - 5€</option>
                                    <option value="">Assicurazione - 5€</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group margin-btm-input-lg">
                            <div class="mb-1">
                                <label for="">Contenuto</label>
                                <textarea name="" id="" cols="30" rows="9" class="form-control custom-select input-gray profile-input" placeholder="Descrivi il contenuto che desideri spedire"></textarea>
                                <small class="text-ash">*Consulta l'elenco delle restrizioni</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="btn-wrapper">
                            <button class="btn p-form-logo bg-green">
                                <i class="mdi mdi-checkbox-multiple-blank-outline"></i>
                            </button>
                            <button class="btn p-form-logo bg-green">
                                <i class="mdi mdi-close"></i>
                            </button>
                            <button class="btn p-form-logo bg-green">
                                <i class="mdi mdi-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <div class="margin-30"></div>
                        <button class="btn btn-success btn-padding-65">Continua</button>
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
<script>
    $(".check_in").flatpickr({
        defaultDate: 'today',
        minDate: 'today',
        altInput: true,
        altFormat: 'F j, Y'
    });
</script>
<script>



    new Vue({
        el: '#home_view_wrapper',
        data: {

        },
        methods: {

        },
    });
</script>

</body>
</html>


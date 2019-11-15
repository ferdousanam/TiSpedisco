<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('page_tagline')</title>

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
    @stack('cssLib')
    <link rel="stylesheet" href="{{asset('css/theme.css')}}">
    @stack('css')
</head>
<body>
<div id="home_view_wrapper">
    {{--headerpage--}}
    @include('User.global.header')
    {{--header end--}}
    {{--inner page--}}
    @yield('content')
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
@stack('scripts')

</body>
</html>


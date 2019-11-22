@extends('User.layouts.app')

@section('page_tagline', 'Indirizzi della spedizione')

@push('cssLib')
@endpush

@section('content')
<div style="min-height:40vh">
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-10">
                    <div class="page-text">Il mio account</div>
                    <div class="page-sub-text">Ciao {{ Auth::user()->first_name }}, da questo pannello puoi gestire il tuo account</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 over-scroll">
                    <div class="tab-wrapper">
                        <ul class="tab-bar">
                            <li aria-controls="dashboard"><a href="{{route('user.dashboard')}}">Dashboard</a></li>
                            <li aria-controls="ticket"><a href="{{route('user.ticket')}}">Ticket</a></li>
                            <li aria-controls="order"><a href="{{route('user.order.index')}}">Ordini</a></li>
                            <li aria-controls="address"><a href="{{route('user.address.index')}}">I miei indirizzi</a></li>
                            <li aria-controls="creditCard"><a href="{{route('user.creditCard')}}">Le mie carte</a></li>
                            <li aria-controls="profile"><a href="{{route('user.profile')}}">Profilo</a></li>
                            <li aria-controls="passChange"><a href="{{route('user.passChange')}}">Sicurezza</a></li>
                            <li aria-controls="fatture"><a href="{{route('user.fatture.index')}}">Fatture</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="content-wrapper">
                        <div class="animated fadeIn">
                            @yield('userContent')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        var parts = window.location.pathname.split('/');
        if (parts.includes('dashboard')) {
            $('li[aria-controls="dashboard"]').addClass('active');
        }
        if (parts.includes('ticket')) {
            $('li[aria-controls="ticket"]').addClass('active');
        }
        if (parts.includes('order')) {
            $('li[aria-controls="order"]').addClass('active');
        }
        if (parts.includes('address')) {
            $('li[aria-controls="address"]').addClass('active');
        }
        if (parts.includes('creditCard')) {
            $('li[aria-controls="creditCard"]').addClass('active');
        }
        if (parts.includes('profile')) {
            $('li[aria-controls="profile"]').addClass('active');
        }
        if (parts.includes('passChange')) {
            $('li[aria-controls="passChange"]').addClass('active');
        }
        if (parts.includes('fatture')) {
            $('li[aria-controls="fatture"]').addClass('active');
        }
    });
</script>
@endpush

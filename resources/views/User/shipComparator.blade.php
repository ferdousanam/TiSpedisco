@extends('User.layouts.app')

@section('page_tagline', 'Ship Comparator')

@push('cssLib')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css">
@endpush

@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="page-text">Risultati della ricerca</div>
                    <div class="page-sub-text">Da {{ $locations['location_from']['formatted_address'] }} a {{ $locations['location_to']['formatted_address'] }} -
                        Peso: {{ $locations['weight'] }}kg
{{--                        Distance: {{ $locations['distance'] }}--}}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-right pt-30 text-sm text-green ">
                        <span><i class="mdi mdi-email-outline"></i></span> &nbsp;&nbsp;
                        <span>Condividi questo preventivo</span>
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
                                            <div class="form-group margin-0 mb-1 position-relative">
                                                <select name="" id=""
                                                        class="form-control mb-1 profile-input input-gray">
                                                    <option value="">Filtra i risultati del preventivo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="form-group margin-0 position-relative">
                                                <select name="" id=""
                                                        class="form-control profile-input input-gray">
                                                    <option value="">Ordina i risultati del preventivoo</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="margin-30"></div>
                        @foreach($carriers as $carrier)
                            @if ($carrier->rates != null)
                                <div class="company-comparator-box-wrapper">
                                    <div class="box-header"></div>
                                    <div class="box-body">
                                        <div class="box-1">
                                            <div class="c-info">preferito</div>
                                            <div class="c-logo">
                                                <img class="ship-comparator-img" src="{{asset($carrier->logo)}}" alt="">
                                            </div>
                                        </div>
                                        <div class="box-2">
                                            <div class="text-xs font-bold">{{ $carrier->title }}</div>
                                            <div>{{ $carrier->rates->estimate_time }}</div>
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
                                                <div class="text-xs font-bold"> {{ $carrier->rates->price }}€</div>
                                                <div>{{ $carrier->rates->price += $carrier->rates->price * $carrier->rates->vat / 100 }}
                                                    € Inc. IVA
                                                </div>
                                            </div>
                                            <div class="btn-box">
                                                <form action="{{ route('ship-details.store') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="selected_carrier"
                                                           value="{{ $carrier->id }}">
                                                    <button class="btn bg-white text-green btn-c carrier"
                                                            data-id="{{ $carrier->id }}">
                                                        Prenota
                                                    </button>
                                                </form>
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
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script>

        $('.carrier').click(function (e) {
            let carrier_id = $(this).attr('data-id');
            localStorage.setItem('carrier_id', carrier_id);
            window.location = "{{ route('ship-details.index') }}";
        });
        // new Vue({
        //     el: '#home_view_wrapper',
        //     data: {},
        //     methods: {},
        // });
    </script>
@endpush

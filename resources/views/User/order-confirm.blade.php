@extends('User.layouts.app')

@section('page_tagline', 'Indirizzi della spedizione')

@push('cssLib')
@endpush

@section('content')
    <div class="page-content">
        <div class="container">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ship-confirm">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="ship-confirm-text">
                                        <div class="page-text">Conferma prenotazione spedizione</div>
                                        <div class="margin-15"></div>
                                        <div class="page-sub-text">Confermiamo la prenotazione
                                            per il ritiro della spezione
                                        </div>
                                        <div class="margin-30"></div>
                                        <p>Numero spedizione: #{{ $order->order_code }}</p>

                                        <p>Data di ritiro: {{ \Carbon\Carbon::parse($order->collection_date)->format('d/m/Y') }}</p>

                                        <p>Referente: {{ $order->receiver_full_name }}</p>
                                        <div class="margin-15"></div>
                                        <div class="text-green text-20">Crea un account e conserva lo storico delle
                                            spedizioni
                                        </div>
                                        <div class="margin-30"></div>
                                        <button class="btn btn-success btn-padding-65 ">Torna alla homepage</button>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="confirm-box"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script>

    </script>
@endpush

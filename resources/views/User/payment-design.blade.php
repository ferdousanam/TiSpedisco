@extends('User.layouts.app')

@section('page_tagline', 'Indirizzi della spedizione')

@push('cssLib')
@endpush

@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-text">Indirizzi della spedizione</div>
                    <div class="page-sub-text">Inserisci gli indirizzi della spezione</div>
                </div>
            </div>
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ship-address payment">
                            <form action="{{ route('payment-design.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="pass-box">
                                            <div class="text-box">
                                                <div class="profile-text-1">totale della spedizione</div>
                                            </div>
                                            <table class="table table-theme">
                                                <thead>
                                                <tr>
                                                    <td>Denominazione spedizione</td>
                                                    <td>Costo</td>
                                                    <td></td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $total = 0;
                                                @endphp
                                                @foreach(session('shipDetails')['ship_items'] as $row)
                                                    @php
                                                        $total += (float)$row['amount'];
                                                    @endphp
                                                    <tr>
                                                        <td>Spedizione per ufficio</td>
                                                        <td class="text-ash">{{ 0 }} €</td>
                                                        <td class="text-right"><i
                                                                class="text-ash mdi mdi-dots-horizontal"></i></td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td><strong>TOTALE</strong></td>
                                                    <td><strong>{{ $total }} €</strong></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>

                                            <div class="form-group margin-btm-input-lg">
                                                <div class="mb-1">
                                                    <label for="">Eventuali note</label>
                                                    <textarea name="possible_notes"
                                                              class="form-control input-gray profile-input"
                                                              id="" cols="30" rows="10"
                                                              placeholder="Scrivi eventuali note che vuoi comunicare allo spedizioniere"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="pass-box">
                                            <div class="text-box">
                                                <div class="profile-text-1">Pagamento</div>
                                            </div>
                                            <div class="text-box">
                                                <div class="">Inserisci i dati della carta di credito per procedere alla
                                                    conferma del pagamento.
                                                </div>
                                            </div>
                                            <div class="margin-30"></div>
                                            <div class="payment-method-wrapper">
                                                <div class="sec-left">
                                                    <div class="form-group">
                                                        <input class="form-check-input styled-checkbox-round"
                                                               type="checkbox" value="1"
                                                               name="payment_method"
                                                               id="check-input1" required>
                                                        <label for="check-input1"></label>
                                                        <label class="form-check-label text-black">
                                                            <span class="font-400">Paga con Paypal</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="sec-right text-center">
                                                    <img src="{{asset('images/home-img/paypal-logo.png')}}" alt="">
                                                </div>
                                            </div>
                                            <div class="payment-method-wrapper">
                                                <div class="sec-left">
                                                    <div class="form-group">
                                                        <input class="form-check-input styled-checkbox-round" checked
                                                               type="checkbox" value="2"
                                                               name="payment_method"
                                                               id="check-input2" required>
                                                        <label for="check-input2"></label>
                                                        <label class="form-check-label text-black">
                                                            <span class="font-400">Paga con Carta di Credito</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="sec-right text-center">
                                                    <img class="payment-logo"
                                                         src="{{asset('images/home-img/payments.png')}}" alt="">
                                                </div>
                                            </div>
                                            <div class="form-group position-relative margin-btm-input-lg">
                                                <div class="mb-1">
                                                    <label for="">Numero carta di credito</label>
                                                    <input type="text" class="form-control input-gray profile-input"
                                                           placeholder="0000 0000 0000 0000"
                                                           name="credit_card_no">
                                                    <img class="input-img" src="{{asset('images/home-img/cards.png')}}"
                                                         alt="">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group margin-btm-input-lg">
                                                        <div class="mb-1">
                                                            <label for="">Data di scadenza</label>
                                                            <input type="text"
                                                                   class="form-control input-gray profile-input"
                                                                   placeholder="00 / 00"
                                                                   name="card_exp">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group margin-btm-input-lg">
                                                        <div class="mb-1">
                                                            <label for="">CVV</label>
                                                            <input type="text"
                                                                   class="form-control input-gray profile-input"
                                                                   placeholder="000"
                                                                   name="card_cvv">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="margin-30"></div>
                                        <div class="form-group">
                                            <input class="form-check-input styled-checkbox" type="checkbox" value="1"
                                                   name="isAccepted"
                                                   id="check" required>
                                            <label for="check"></label>
                                            <label class="form-check-label text-black">
                                                <span class="font-400"> Accetto le condizioni di vendita espresse nei termini e condizioni del sito web</span>
                                            </label>
                                        </div>
                                        <div class="margin-30"></div>
                                        <div class="margin-30"></div>
                                        <div class="form-group text-right">
                                            <button class="btn btn-success btn-padding-65">Conferma pagamento</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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

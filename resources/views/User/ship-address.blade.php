@extends('User.layouts.app')

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
                        <div class="ship-address">
                            <form action="{{ route('ship-address.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="pass-box">
                                            <div class="text-box">
                                                <div class="profile-text-1">MITTENTE</div>
                                                <div class="profile-text-2"><span>Mi serve la fattura</span>
                                                    <span class="toggle-logo">
                                                        <label class="switch">
                                                            <input type="checkbox" name="isInvoice">
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group margin-btm-input-lg">
                                                        <div class="mb-1">
                                                            <label for="">Nome</label>
                                                            <input type="text"
                                                                   class="form-control input-gray profile-input"
                                                                   placeholder="Inserisci il nome completo"
                                                                   name="sender_first_name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group margin-btm-input-lg">
                                                        <div class="mb-1">
                                                            <label for="">Cognome </label>
                                                            <input type="text"
                                                                   class="form-control input-gray profile-input"
                                                                   placeholder="Inserisci il cognome "
                                                                   name="sender_surname">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group margin-btm-input-lg">
                                                <div class="mb-1">
                                                    <label for="">Email</label>
                                                    <input type="text"
                                                           class="form-control input-gray profile-input"
                                                           placeholder="Indirizzo email"
                                                           name="sender_email">
                                                    <br>
                                                    <small class="text-green" style="text-decoration: underline">Non hai
                                                        un account? Crealo qui</small>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group margin-btm-input-lg">
                                                        <div class="mb-1">
                                                            <label for="">Nome Società</label>
                                                            <input type="text"
                                                                   class="form-control input-gray profile-input"
                                                                   placeholder="Scrivi il nome della società"
                                                                   name="sender_company_name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group margin-btm-input-lg">
                                                        <div class="mb-1">
                                                            <label for="">Indirizzo PEC </label>
                                                            <input type="text"
                                                                   class="form-control input-gray profile-input"
                                                                   placeholder="Indirizzo PEC"
                                                                   name="sender_pec_address">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group margin-btm-input-lg">
                                                        <div class="mb-1">
                                                            <label for="">Codice SDI</label>
                                                            <input type="text"
                                                                   class="form-control input-gray profile-input"
                                                                   placeholder="Codice di interscambio"
                                                                   name="sender_sdi_code">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group margin-btm-input-lg">
                                                        <div class="mb-1">
                                                            <label for="">Partita iva </label>
                                                            <input type="text"
                                                                   class="form-control input-gray profile-input"
                                                                   placeholder="Partita iva"
                                                                   name="sender_vat_no">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group custom-p-input margin-btm-input-lg">
                                                        <div class="mb-1">
                                                            <label for="">Numero di cellulare</label>
                                                            <input type="text"
                                                                   class="form-control input-gray profile-input"
                                                                   placeholder="Scrivi il tuo recapito telefonico"
                                                                   name="sender_phone">
                                                        </div>
                                                    </div>
                                                    <div class="custom-p-logo">
                                                        <button class="btn bg-green p-form-logo"><i
                                                                class="mdi mdi-alert-circle-outline"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group margin-btm-input-lg">
                                                <div class="mb-1">
                                                    <label for="Indirizzo">Indirizzo</label>
                                                    <input type="text" id="Indirizzo"
                                                           class="form-control input-gray profile-input"
                                                           placeholder="Indirizzo riga 1"
                                                           name="sender_address_1">
                                                </div>
                                            </div>

                                            <div class="form-group margin-btm-input-lg">
                                                <div class="mb-1">
                                                    <input type="text" class="form-control input-gray profile-input"
                                                           placeholder="Indirizzo riga 2"
                                                           name="sender_address_2">
                                                </div>
                                            </div>

                                            <div class="form-group margin-btm-input-lg">
                                                <div class="mb-1">
                                                    <label for="">Città</label>
                                                    <input type="text" class="form-control input-gray profile-input"
                                                           placeholder="Seleziona la città"
                                                           name="sender_city">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group margin-btm-input-lg">
                                                        <div class="mb-1">
                                                            <label for="">Provincia</label>
                                                            <input type="text"
                                                                   class="form-control input-gray profile-input"
                                                                   placeholder="Seleziona la provincia"
                                                                   name="sender_province">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group margin-btm-input-lg">
                                                        <div class="mb-1">
                                                            <label for="">Cap</label>
                                                            <input type="text"
                                                                   class="form-control input-gray profile-input"
                                                                   placeholder="Seleziona il cap"
                                                                   name="sender_post_code">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group margin-btm-input-lg">
                                                <div class="mb-1">
                                                    <label for="">Paese</label>
                                                    <input type="text" class="form-control input-gray profile-input"
                                                           placeholder="Seleziona il paese"
                                                           name="sender_country">
                                                </div>
                                            </div>
                                            <div class="form-group margin-btm-input-lg">
                                                <div class="form-divider"></div>
                                            </div>
                                            <div class="text-box">
                                                <div class="profile-text-1">MITTENTE: indirizzo di parenza</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group custom-p-input margin-btm-input-lg">
                                                        <div class="mb-1">
                                                            <label for="">Numero di cellulare</label>
                                                            <input type="text"
                                                                   class="form-control input-gray profile-input"
                                                                   placeholder="Scrivi il tuo recapito telefonico"
                                                                   name="departure_phone">
                                                        </div>
                                                    </div>
                                                    <div class="custom-p-logo">
                                                        <button class="btn bg-green p-form-logo"><i
                                                                class="mdi mdi-alert-circle-outline"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group margin-btm-input-lg">
                                                <div class="mb-1">
                                                    <label for="Indirizzo">Indirizzo</label>
                                                    <input type="text" id="Indirizzo"
                                                           class="form-control input-gray profile-input"
                                                           placeholder="Indirizzo riga 1"
                                                           name="departure_address_1">
                                                </div>
                                            </div>

                                            <div class="form-group margin-btm-input-lg">
                                                <div class="mb-1">
                                                    <input type="text" class="form-control input-gray profile-input"
                                                           placeholder="Indirizzo riga 2"
                                                           name="departure_address_2">
                                                </div>
                                            </div>

                                            <div class="form-group margin-btm-input-lg">
                                                <div class="mb-1">
                                                    <label for="">Città</label>
                                                    <input type="text" class="form-control input-gray profile-input"
                                                           placeholder="Seleziona la città"
                                                           name="departure_city">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group margin-btm-input-lg">
                                                        <div class="mb-1">
                                                            <label for="">Provincia</label>
                                                            <input type="text"
                                                                   class="form-control input-gray profile-input"
                                                                   placeholder="Seleziona la provincia"
                                                                   name="departure_province">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group margin-btm-input-lg">
                                                        <div class="mb-1">
                                                            <label for="">Cap</label>
                                                            <input type="text"
                                                                   class="form-control input-gray profile-input"
                                                                   placeholder="Seleziona il cap"
                                                                   name="departure_post_code">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group margin-btm-input-lg">
                                                <div class="mb-1">
                                                    <label for="">Paese</label>
                                                    <input type="text" class="form-control input-gray profile-input"
                                                           placeholder="Seleziona il paese"
                                                           name="departure_country">
                                                </div>
                                            </div>
                                            <div class="form-group margin-btm-input-lg"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="pass-box">
                                            <div class="text-box">
                                                <div class="profile-text-1">DESTINATARIO</div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group margin-btm-input-lg">
                                                        <div class="mb-1">
                                                            <label for="">Nome</label>
                                                            <input type="text"
                                                                   class="form-control input-gray profile-input"
                                                                   placeholder="Inserisci il nome completo"
                                                                   name="recipient_first_name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group margin-btm-input-lg">
                                                        <div class="mb-1">
                                                            <label for="">Cognome </label>
                                                            <input type="text"
                                                                   class="form-control input-gray profile-input"
                                                                   placeholder="Inserisci il cognome "
                                                                   name="recipient_surname">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group margin-btm-input-lg">
                                                <div class="mb-1">
                                                    <label for="">Email</label>
                                                    <input type="text"
                                                           class="form-control input-gray profile-input"
                                                           placeholder="Indirizzo email"
                                                           name="recipient_email">
                                                </div>
                                            </div>
                                            <div class="form-group margin-btm-input-lg">
                                                <div class="mb-1">
                                                    <label for="Indirizzo">Indirizzo</label>
                                                    <input type="text" id="Indirizzo"
                                                           class="form-control input-gray profile-input"
                                                           placeholder="Indirizzo riga 1"
                                                           name="recipient_address_1">
                                                </div>
                                            </div>

                                            <div class="form-group margin-btm-input-lg">
                                                <div class="mb-1">
                                                    <input type="text" class="form-control input-gray profile-input"
                                                           placeholder="Indirizzo riga 2"
                                                           name="recipient_address_2">
                                                </div>
                                            </div>

                                            <div class="form-group margin-btm-input-lg">
                                                <div class="mb-1">
                                                    <label for="">Città</label>
                                                    <input type="text" class="form-control input-gray profile-input"
                                                           placeholder="Seleziona la città"
                                                           name="recipient_city">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group margin-btm-input-lg">
                                                        <div class="mb-1">
                                                            <label for="">Provincia</label>
                                                            <input type="text"
                                                                   class="form-control input-gray profile-input"
                                                                   placeholder="Seleziona la provincia"
                                                                   name="recipient_province">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group margin-btm-input-lg">
                                                        <div class="mb-1">
                                                            <label for="">Cap</label>
                                                            <input type="text"
                                                                   class="form-control input-gray profile-input"
                                                                   placeholder="Seleziona il cap"
                                                                   name="recipient_post_code">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group margin-btm-input-lg">
                                                <div class="mb-1">
                                                    <label for="">Paese</label>
                                                    <input type="text" class="form-control input-gray profile-input"
                                                           placeholder="Seleziona il paese">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="margin-30"></div>
                                        <div class="margin-30"></div>
                                        <div class="form-group text-right">
                                            <button class="btn btn-success btn-padding-65">Continua</button>
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

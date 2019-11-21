@extends('User.layouts.app')

@push('cssLib')
@endpush

@section('content')
    <div id="app-ship">
        <div class="page-content paddint-top-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        {{--alert--}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-text">Calcolo della spedizione</div>
                        <div class="page-sub-text">Fornisci ulteriori dettagli per avere un prezzo della spedizione
                            accurata
                        </div>
                    </div>
                </div>
                <div class="content-wrapper">
                    <form action="{{ route('api.ship-details.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <div class="text-xl"><strong>Spezione per Uff|</strong></div>
                            </div>
                            <div class="col-md-3">
                                <div class="text-xs mb-1"><strong> Data per il ritiro</strong></div>
                                <div class="position-relative">
                                    <div class="form-group">
                                        <input class="form-control input-gray check_in" type="text"
                                               name="collection_date"
                                               v-model="shipmentInfo.collection_date"
                                               required>
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
                                               placeholder="Lunghezza" name="total_length"
                                               v-model="shipmentInfo.total_length">
                                    </div>
                                </div>
                                <div class="form-group margin-btm-input-lg">
                                    <div class="mb-1">
                                        <input type="text" class="form-control input-gray profile-input"
                                               placeholder="Lunghezza" name="total_width"
                                               v-model="shipmentInfo.total_width">
                                    </div>
                                </div>
                                <div class="form-group margin-btm-input-lg">
                                    <div class="mb-1">
                                        <label for="">Valore della merce</label>
                                        <input type="text" class="form-control input-gray profile-input"
                                               placeholder="€" name="total_amount"
                                               v-model="shipmentInfo.total_amount">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group margin-btm-input-lg">
                                    <div class="mb-1">
                                        <label for="">&nbsp;</label>
                                        <input type="text" class="form-control input-gray profile-input"
                                               placeholder="Altezza" name="total_height"
                                               v-model="shipmentInfo.total_height">
                                    </div>
                                </div>
                                <div class="form-group margin-btm-input-lg">
                                    <div class="mb-1">
                                        <input type="text" class="form-control input-gray profile-input"
                                               placeholder="Peso" name="total_weight"
                                               v-model="shipmentInfo.total_weight">
                                    </div>
                                </div>
                                <div class="form-group margin-btm-input-lg">
                                    <div class="mb-1">
                                        <label for="">Servizi aggiuntivi</label>
                                        <select class="form-control custom-select input-gray profile-input"
                                                v-model="shipmentInfo.total_additional_service">
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
                                        <textarea name="total_content" id="" cols="30" rows="9"
                                                  class="form-control custom-select input-gray profile-input"
                                                  placeholder="Descrivi il contenuto che desideri spedire"
                                                  v-model="shipmentInfo.total_content"></textarea>
                                        <small class="text-ash">*Consulta l'elenco delle restrizioni</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-divider"></div>

                        <section v-for="(shipment,index) in shipmentInfo.shipments" class="ship-name">
                            <div class="row">
                                <div class="margin-30"></div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control w-100 text-xl text-ash font-bold ship-detail-input-1" placeholder="Assegna un nome alla spedizione">
                                </div>
                            </div>
                            <div class="row">
                                <div class="margin-30"></div>
                                <div class="col-md-3">
                                    <div class="form-group margin-btm-input-lg">
                                        <div class="mb-1">
                                            <label for="">Dimensioni</label>
                                            <input type="text" class="form-control input-gray profile-input"
                                                   placeholder="Lunghezza" name="length[]" v-model="shipment.width">
                                        </div>
                                    </div>
                                    <div class="form-group margin-btm-input-lg">
                                        <div class="mb-1">
                                            <input type="text" class="form-control input-gray profile-input"
                                                   placeholder="Lunghezza" name="length2[]" v-model="shipment.length">
                                        </div>
                                    </div>
                                    <div class="form-group margin-btm-input-lg">
                                        <div class="mb-1">
                                            <label for="">Valore della merce</label>
                                            <input type="text" class="form-control input-gray profile-input"
                                                   placeholder="€" name="amount[]" v-model="shipment.price">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group margin-btm-input-lg">
                                        <div class="mb-1">
                                            <label for="">&nbsp;</label>
                                            <input type="text" class="form-control input-gray profile-input"
                                                   placeholder="Altezza" name="height[]" v-model="shipment.height">
                                        </div>
                                    </div>
                                    <div class="form-group margin-btm-input-lg">
                                        <div class="mb-1">
                                            <input type="text" class="form-control input-gray profile-input"
                                                   placeholder="Peso" name="weight[]" v-model="shipment.weight">
                                        </div>
                                    </div>
                                    <div class="form-group margin-btm-input-lg">
                                        <div class="mb-1">
                                            <label for="">Servizi aggiuntivi</label>
                                            <select class="form-control custom-select input-gray profile-input"
                                                    name="additional_service[]" id=""
                                                    v-model="shipment.additional_cost">
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
                                            <textarea name="content[]" id="" cols="30" rows="9"
                                                      class="form-control custom-select input-gray profile-input"
                                                      placeholder="Descrivi il contenuto che desideri spedire"
                                                      v-model="shipment.content"></textarea>
                                            <small class="text-ash">*Consulta l'elenco delle restrizioni</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1 text-center">
                                    <div class="btn-wrapper">
                                        <button type="button" class="btn p-form-logo bg-green"
                                                @click="DuplicateShipment(shipment)">
                                            <i class="mdi mdi-checkbox-multiple-blank-outline"></i>
                                        </button>
                                        <button type="button" class="btn p-form-logo bg-green"
                                                @click="DeleteShipment(index)">
                                            <i class="mdi mdi-close"></i>
                                        </button>
                                        <button type="button" class="btn p-form-logo bg-green" @click="AddNewShipment">
                                            <i class="mdi mdi-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section id="add-row"></section>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <div class="margin-30"></div>
                                <button type="button" @click="submitShipment" class="btn btn-success btn-padding-65">
                                    Continua
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script>
        $('.content-wrapper').on('click', '.mdi-checkbox-multiple-blank-outline', function (e) {
            e.preventDefault();
            let html = '<section class="ship-name">';
            html += $(this).closest('.ship-name').html();
            html += '</section>';
            // console.log(html);
            $('#add-row').append(html);
        })
    </script>
    <script>
        new Vue({
            el: '#app-ship',
            data: {
                shipmentInfo: {
                    collection_date: '',
                    total_length: '',
                    total_height: '',
                    total_width: '',
                    total_weight: '',
                    total_additional_service: '',
                    total_content: '',
                    shipments: [
                        {width: '', height: '', length: '', weight: '', price: '', additional_cost: '', content: ''},
                    ]
                }
            },
            methods: {
                DuplicateShipment(shipment) {
                    this.shipmentInfo.shipments.push({
                        width: shipment.width,
                        height: shipment.height,
                        length: shipment.length,
                        weight: shipment.weight,
                        price: shipment.price,
                        additional_cost: shipment.additional_cost,
                        content: shipment.content,
                    })
                },
                DeleteShipment(index) {
                    this.shipmentInfo.shipments.splice(index, 1);
                },
                AddNewShipment() {
                    this.shipmentInfo.shipments.push({
                        width: '',
                        height: '',
                        length: '',
                        weight: '',
                        price: '',
                        additional_cost: '',
                        content: '',
                    })
                },
                submitShipment() {
                    let self = this;
                    $.ajax({
                        url: '{{ route('api.ship-details.index') }}',
                        type: 'post',
                        data: {shipmentInfo: self.shipmentInfo, _token : '{{csrf_token()}}'},
                        success: function (res) {
                            console.log(res);
                            window.location = '{{ route('ship-address.index') }}'
                        }
                    })
                },
            },
            mounted() {
                let self = this;
                $(".check_in").flatpickr({
                    defaultDate: 'today',
                    minDate: 'today',
                    altInput: true,
                    altFormat: 'F j, Y',
                    disableMobile: "true",
                    onChange: function(selectedDates, dateStr, instance) {
                        self.collection_date = dateStr;
                    }
                });
            }
        })
    </script>
@endpush

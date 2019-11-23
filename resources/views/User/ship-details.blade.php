@extends('User.layouts.app')

@section('page_tagline', 'Calcolo della spedizione')

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
                        <section v-for="(shipment,index) in shipmentInfo.shipments" class="ship-name">
                            <div class="row" v-if="index == 0">
                                <div class="col-md-9">
                                    <div class="text-xl">
                                        <strong>
                                            <input type="text"
                                                   class="form-control w-100 text-xl text-black font-bold ship-detail-input-1"
                                                   placeholder="Assegna un nome alla spedizione"
                                                   v-model="shipment.name" required>
                                        </strong>
                                    </div>
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
                            <div class="form-divider" v-if="index != 0"></div>
                            <div class="row" v-if="index != 0">
                                <div class="margin-30"></div>
                                <div class="col-md-12">
                                    <input type="text"
                                           class="form-control w-100 text-xl text-ash font-bold ship-detail-input-1"
                                           placeholder="Assegna un nome alla spedizione"
                                           v-model="shipment.name" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="margin-30"></div>
                                <div class="col-md-3">
                                    <div class="form-group margin-btm-input-lg">
                                        <div class="mb-1">
                                            <label for="">Dimensioni</label>
                                            <input type="text" class="form-control input-gray profile-input"
                                                   placeholder="Lunghezza" name="length[]" v-model="shipment.width"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="form-group margin-btm-input-lg">
                                        <div class="mb-1">
                                            <input type="text" class="form-control input-gray profile-input"
                                                   placeholder="Lunghezza" name="length2[]" v-model="shipment.length"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="form-group margin-btm-input-lg">
                                        <div class="mb-1">
                                            <label for="">Valore della merce</label>
                                            <input type="text" class="form-control input-gray profile-input"
                                                   placeholder="€" name="amount[]" v-model="shipment.price" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group margin-btm-input-lg">
                                        <div class="mb-1">
                                            <label for="">&nbsp;</label>
                                            <input type="text" class="form-control input-gray profile-input"
                                                   placeholder="Altezza" name="height[]" v-model="shipment.height"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="form-group margin-btm-input-lg">
                                        <div class="mb-1">
                                            <input type="text" class="form-control input-gray profile-input"
                                                   placeholder="Peso" name="weight[]" v-model="shipment.weight"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="form-group margin-btm-input-lg">
                                        <div class="mb-1">
                                            <label for="">Servizi aggiuntivi</label>
                                            <select class="form-control custom-select input-gray profile-input"
                                                    name="additional_service[]" id=""
                                                    v-model="shipment.additional_cost" required>
                                                <option value="5">Assicurazione - 5€</option>
                                                <option value="5">Assicurazione - 5€</option>
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
                                                @click="DeleteShipment(index)"
                                                v-if="index != 0">
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
                    collection_date: '{{\Carbon\Carbon::today()->format("Y-m-d")}}',
                    name: '',
                    total_length: '10',
                    total_height: '10',
                    total_width: '10',
                    total_weight: '10',
                    total_price: '1000',
                    total_additional_service: '5',
                    total_content: 'Total Content Total Content Total Content Total Content Total Content Total Content',
                    shipments: [
                        {
                            name: 'Spezione per Uff|',
                            width: '5',
                            height: '5',
                            length: '5',
                            weight: '5',
                            price: '500',
                            additional_cost: '5',
                            content: 'Content 1 Content 1 Content 1 Content 1 Content 1 Content 1 Content 1 Content 1'
                        },
                    ]
                }
            },
            methods: {
                DuplicateShipment(shipment) {
                    this.shipmentInfo.shipments.push({
                        name: shipment.name,
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
                        name: '',
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
                    self.shipmentInfo.name = self.shipmentInfo.shipments[0].name;
                    self.shipmentInfo.total_length = self.shipmentInfo.shipments[0].length;
                    self.shipmentInfo.total_height = self.shipmentInfo.shipments[0].height;
                    self.shipmentInfo.total_width = self.shipmentInfo.shipments[0].width;
                    self.shipmentInfo.total_weight = self.shipmentInfo.shipments[0].weight;
                    self.shipmentInfo.total_price = self.shipmentInfo.shipments[0].price;
                    self.shipmentInfo.total_additional_service = self.shipmentInfo.shipments[0].additional_cost;
                    self.shipmentInfo.total_content = self.shipmentInfo.shipments[0].content;
                    $.ajax({
                        url: '{{ route('api.ship-details.index') }}',
                        type: 'post',
                        data: {shipmentInfo: self.shipmentInfo, _token: '{{csrf_token()}}'},
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
                    onChange: function (selectedDates, dateStr, instance) {
                        self.collection_date = dateStr;
                    }
                });
            }
        })
    </script>
@endpush

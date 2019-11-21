@extends('User.profile.profileMaster')

@section('userContent')
    <div id="orderVue">
        <template v-if="activity=='list'">
            <div class="state-order">
                <div class="row">
                    <div class="col-md-8">
                        <table class="table table-theme">
                            <thead>
                            <tr>
                                <th>Ordine numero</th>
                                <th>Data</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="order in orders">
                                <td>#@{{ order.order_code }}</td>
                                <td class="text-ash">@{{moment(order.created_at).startOf('hour').fromNow()}}</td>
                                <td class="text-right"><i @click="getSingleOrder(order.id)"
                                                          class="text-ash mdi mdi-dots-horizontal"></i></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-offset-1 col-md-3">
                        <div class="order-box"></div>
                    </div>
                </div>
            </div>
        </template>
        <template v-if="activity=='single'">
            <div class="state-order">
                <div class="row mb-10">
                    <div class="margin-30"></div>
                    <div class="margin-30"></div>
                    <div class="col-sm-4">
                        <div class="text-20">Ordine numero #@{{ order_details.order_code }} del @{{moment(order_details.created_at).format('DD/MM/YYYY')}}</div>
                        <div class="margin-15"></div>
                        <div class="order-detail-box text-20">
                            <div class="text-20"><strong>Consegna a:</strong></div>
                            <div class="text-20">Indirizzo: @{{ order_details.receiver_address_1 + ' ' +
                                order_details.receiver_address_2 }}
                            </div>
                            <div class="margin-30"></div>
                            <div>Destinatario: @{{ order_details.receiver_full_name }}</div>
                            <div>Email: @{{ order_details.receiver_email }}</div>
                            <div>Tel: @{{ order_details.receiver_phone }}</div>
                        </div>
                    </div>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <div class="text-right">
                            <small><span>Hai bisogno di aiuto?</span>&nbsp; <a href="#" class="text-green">Apri un
                                    ticket</a></small>
                        </div>
                        <div class="text-20">
                            <div class="margin-15"></div>
                            <div><strong>Partito da:</strong></div>
                            <div>Indirizzo: @{{ order_details.departure_address_1 + ' ' +
                                order_details.departure_address_2 }}
                            </div>
                            <div class="margin-15"></div>
                            <div>Mittente: @{{ order_details.sender_full_name }}</div>
                            <div>Email: @{{ order_details.sender_email }}</div>
                            <div>Tel: @{{ order_details.departure_phone }}</div>
                            <div class="margin-15"></div>
                            <div><strong>Fattura a:</strong></div>
                            <div>Simone Chinaglia</div>
                            <div>p.iva 01382017038</div>
                            <div>SDI: @{{ order_details.sender_sdi_code }}</div>
                            <div>Indirizzo: @{{ order_details.sender_address_1 + ' ' + order_details.sender_address_2
                                }}
                            </div>
                            <div>@{{ order_details.departure_country }}</div>
                            <div class="margin-15"></div>
                            <small><a href="#" class="text-green text-xs">Vai alla fattura elettronica</a></small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="progress-box text-green">
                            <div class="icon-box">
                                <i class="mdi mdi-flag"></i>
                                <div class="bar-long"></div>
                            </div>
                            <div class="status-box">Prenotazione spedizione reicevuta</div>
                        </div>
                        <div class="progress-box text-green">
                            <div class="icon-box">
                                <i class="mdi mdi-calendar-check"></i>
                                <div class="bar-long"></div>
                            </div>
                            <div class="status-box">Prenotazione spedizione reicevuta</div>
                        </div>
                        <div class="progress-box text-green">
                            <div class="icon-box">
                                <i class="mdi mdi-bus"></i>
                                <div class="bar-long"></div>
                            </div>
                            <div class="status-box">Prenotazione spedizione reicevuta</div>
                        </div>
                        <div class="progress-box text-orange">
                            <div class="icon-box">
                                <i class="mdi mdi-flag"></i>
                                <div class="bar-long"></div>
                            </div>
                            <div class="status-box">Prenotazione spedizione reicevuta</div>
                        </div>
                        <div class="progress-box text-ash">
                            <div class="icon-box">
                                <i class="mdi mdi-flag"></i>
                                <div class="bar-long"></div>
                            </div>
                            <div class="status-box">Prenotazione spedizione reicevuta</div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
@endsection


@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>

    <script type="text/javascript">
        new Vue({
            el: '#orderVue',
            data: {
                activity: 'list',
                orders: [],
                order_details: {},
            },
            methods: {
                moment(time) {
                    return moment(time).locale("it");
                },
                activityChange(activity = 'list') {
                    this.$set(this, 'activity', activity);
                    switch (activity) {
                        case 'single':
                            break;
                        case 'list':
                            this.activity = activity;
                            break;
                        default:
                            this.activity = 'list';
                            break;
                    }
                },
                getAllOrders() {
                    let self = this;
                    axios.get("{{route('api.order.index')}}")
                        .then(function (response) {
                            if (!response.data.success) return;
                            self.orders = response.data.orders;
                        })
                },
                getSingleOrder(order_id) {
                    let self = this;
                    self.activityChange('single');
                    axios.get("{{route('api.order.index')}}/" + order_id)
                        .then(function (response) {
                            if (!response.data.success) return;
                            console.log(response.data.order);
                            self.order_details = response.data.order;
                        })
                }
            },
            mounted() {
                this.getAllOrders();
            },
        });
    </script>
@endpush

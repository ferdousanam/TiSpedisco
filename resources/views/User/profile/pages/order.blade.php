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
                        <tr>
                            <td>#12345</td>
                            <td class="text-ash">10 minuti fa</td>
                            <td class="text-right"><i class="text-ash mdi mdi-dots-horizontal"></i></td>
                        </tr>
                        <tr>
                            <td>#12345</td>
                            <td class="text-ash">10 minuti fa</td>
                            <td class="text-right"><i class="text-ash mdi mdi-dots-horizontal"></i></td>
                        </tr>
                        <tr>
                            <td>#12345</td>
                            <td class="text-ash">10 minuti fa</td>
                            <td class="text-right"><i class="text-ash mdi mdi-dots-horizontal"></i></td>
                        </tr>
                        <tr>
                            <td>#12345</td>
                            <td class="text-ash">10 minuti fa</td>
                            <td class="text-right"><i class="text-ash mdi mdi-dots-horizontal"></i></td>
                        </tr>
                        <tr>
                            <td>#12345</td>
                            <td class="text-ash">10 minuti fa</td>
                            <td class="text-right"><i class="text-ash mdi mdi-dots-horizontal"></i></td>
                        </tr>
                        <tr>
                            <td>#12345</td>
                            <td class="text-ash">10 minuti fa</td>
                            <td class="text-right"><i class="text-ash mdi mdi-dots-horizontal"></i></td>
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
                    <div class="text-20">Ordine numero #12345 del 12/09/2019</div>
                    <div class="margin-15"></div>
                    <div class="order-detail-box text-20">
                        <div class="text-20"><strong>Consegna a:</strong></div>
                        <div class="text-20">Indirizzo: via zezio 63 22100 Como </div>
                        <div class="margin-30"></div>
                        <div>Destinatario: Simone Chinaglia</div>
                        <div>Email: hello@simonechinaglia.net</div>
                        <div>Tel: 3318327474</div>
                    </div>
                </div>
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="text-right">
                        <small><span>Hai bisogno di aiuto?</span>&nbsp; <a href="#" class="text-green">Apri un ticket</a></small>
                    </div>
                    <div class="text-20">
                        <div class="margin-15"></div>
                        <div><strong>Partito da:</strong></div>
                        <div>Indirizzo: via zezio 63 22100 Como </div>
                        <div class="margin-15"></div>
                        <div>Mittente: Simone Chinaglia</div>
                        <div>Email: hello@simonechinaglia.net</div>
                        <div>Tel: 3318327474</div>
                        <div class="margin-15"></div>
                        <div><strong>Fattura a:</strong></div>
                        <div>Simone Chinaglia</div>
                        <div>p.iva 01382017038</div>
                        <div>SDI: SLZUBAI</div>
                        <div>Indirizzo: via zezio 63 22100 Como </div>
                        <div>Italia</div>
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

<script type="text/javascript">
    new Vue({
        el: '#orderVue',
        data: {
            activity: 'list'
        },
        methods: {
            clear() {
            }
        },
        mounted() {
            this.clear();
        },
    });
</script>
@endpush
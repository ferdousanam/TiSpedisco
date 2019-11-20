@extends('User.profile.profileMaster')

@section('userContent')
<div id="creditCardVue">
    <div class="state-credit">
        <div class="row">
            <div class="col-md-4">
                <div class="address-box-wrapper">
                    <div class="address-box">
                        <div class="credit-info">
                            <div class="sec-logo">
                                <i class="mdi mdi-lg  mdi-credit-card"></i>
                            </div>
                            <div class="sec-number"><span>**** **** **** 1123</span></div>
                        </div>
                        <div class="add-text">Intestata a:</div>
                        <div  class="add-text">Simone Chinaglia</div>
                        <div data-toggle="modal" data-target="#editCreditCard" class="text-right c-pointer"><span class="text-green text-sm ">Modifica</span> &nbsp;<i class="text-green mdi-sm  mdi mdi-wrench"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="address-box-wrapper">
                    <div class="address-box">
                        <div class="credit-info">
                            <div class="sec-logo">
                                <i class="mdi mdi-lg  mdi-credit-card"></i>
                            </div>
                            <div class="sec-number"><span>**** **** **** 1123</span></div>
                        </div>
                        <div class="add-text">Intestata a:</div>
                        <div  class="add-text">Simone Chinaglia</div>
                        <div data-toggle="modal" data-target="#editCreditCard" class="text-right c-pointer"><span class="text-green text-sm ">Modifica</span> &nbsp;<i class="text-green mdi-sm  mdi mdi-wrench"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="address-box-wrapper">
                    <div class="address-box">
                        <div class="credit-info">
                            <div class="sec-logo">
                                <i class="mdi mdi-lg  mdi-credit-card"></i>
                            </div>
                            <div class="sec-number"><span>**** **** **** 1123</span></div>
                        </div>
                        <div class="add-text">Intestata a:</div>
                        <div  class="add-text">Simone Chinaglia</div>
                        <div data-toggle="modal" data-target="#editCreditCard" class="text-right c-pointer"><span class="text-green text-sm ">Modifica</span> &nbsp;<i class="text-green mdi-sm  mdi mdi-wrench"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- /.modal-edit-credit -->
    <div class="modal fade" id="editCreditCard" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-custom">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title"><strong>Modifica Carta di pagamento</strong></h5>
                </div>
                <div class="modal-body modal-header-custom">
                    <p>Utilizza questo form per modificare la carta di credito, ricordati di cliccare sul botte "Salva"
                        al termine. Verrà effettuata addebitata una piccola somma per verifica, la quale verrà
                        immediatamente stornata ad esito positivo.</p>
                    <div class="form-group position-relative margin-btm-input-lg">
                        <div class="mb-1">
                            <label for="">Numero carta di credito</label>
                            <input type="text" class="form-control input-gray profile-input"
                                   placeholder="0000 0000 0000 0000">
                            <img class="input-img" src="{{asset('images/home-img/cards.png')}}" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group margin-btm-input-lg">
                                <div class="mb-1">
                                    <label for="">Data di scadenza</label>
                                    <input type="text" class="form-control input-gray profile-input"
                                           placeholder="00 / 00">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group margin-btm-input-lg">
                                <div class="mb-1">
                                    <label for="">CVV</label>
                                    <input type="text" class="form-control input-gray profile-input"
                                           placeholder="000">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer modal-footer-custom">
                    <button type="button" class="btn btn-close" data-dismiss="modal">Non salvare</button>
                    <button class="btn btn-success">Salva modifiche</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
@endsection


@push('scripts')

<script type="text/javascript">
    new Vue({
        el: '#creditCardVue',
        data: {
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
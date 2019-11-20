@extends('User.profile.profileMaster')

@section('userContent')
<div id="addressVue">
    <div class="state-address">
        <div class="row mb-10">
            <div class="col-md-6">
                <div class="form-group margin-btm-input">
                    <div class="input-group">
                        <div class="input-group-addon home-input-group"><i
                                    class="mdi mdi-md mdi-magnify"></i></div>
                        <input type="text" class="form-control home-input"
                                placeholder="Cerca indirizzo...">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="address-box-wrapper">
                    <div class="address-box">
                        <div class="text-left"><i class="text-green mdi mdi-redo mdi-sm"></i> &nbsp;<span class="text-green text-sm">Spedisci</span></div>
                        <div class="add-text">Simone Chinaglia</div>
                        <div  class="add-text">Via zezio 63</div>
                        <div  class="add-text">22100 Como Italia</div>
                        <div data-toggle="modal" data-target="#editAddress" class="text-right c-pointer"><span class="text-green text-sm ">Modifica</span> &nbsp;<i class="text-green mdi-sm  mdi mdi-wrench"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="address-box-wrapper">
                    <div class="address-box">
                        <div class="text-left"><i class="text-green mdi mdi-redo mdi-sm"></i> &nbsp;<span class="text-green text-sm">Spedisci</span></div>
                        <div class="add-text">Simone Chinaglia</div>
                        <div  class="add-text">Via zezio 63</div>
                        <div  class="add-text">22100 Como Italia</div>
                        <div data-toggle="modal" data-target="#editAddress" class="text-right c-pointer"><span class="text-green text-sm ">Modifica</span> &nbsp;<i class="text-green mdi-sm  mdi mdi-wrench"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="address-box-wrapper">
                    <div class="address-box">
                        <div class="text-left"><i class="text-green mdi mdi-redo mdi-sm"></i> &nbsp;<span class="text-green text-sm">Spedisci</span></div>
                        <div class="add-text">Simone Chinaglia</div>
                        <div  class="add-text">Via zezio 63</div>
                        <div  class="add-text">22100 Como Italia</div>
                        <div data-toggle="modal" data-target="#editAddress" class="text-right c-pointer"><span class="text-green text-sm ">Modifica</span> &nbsp;<i class="text-green mdi-sm  mdi mdi-wrench"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="address-box-wrapper">
                    <div class="address-box">
                        <div class="text-left"><i class="text-green mdi mdi-redo mdi-sm"></i> &nbsp;<span class="text-green text-sm">Spedisci</span></div>
                        <div class="add-text">Simone Chinaglia</div>
                        <div  class="add-text">Via zezio 63</div>
                        <div  class="add-text">22100 Como Italia</div>
                        <div data-toggle="modal" data-target="#editAddress" class="text-right c-pointer"><span class="text-green text-sm ">Modifica</span> &nbsp;<i class="text-green mdi-sm  mdi mdi-wrench"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="address-box-wrapper">
                    <div class="address-box">
                        <div class="text-left"><i class="text-green mdi mdi-redo mdi-sm"></i> &nbsp;<span class="text-green text-sm">Spedisci</span></div>
                        <div class="add-text">Simone Chinaglia</div>
                        <div  class="add-text">Via zezio 63</div>
                        <div  class="add-text">22100 Como Italia</div>
                        <div data-toggle="modal" data-target="#editAddress" class="text-right c-pointer"><span class="text-green text-sm ">Modifica</span> &nbsp;<i class="text-green mdi-sm  mdi mdi-wrench"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="address-box-wrapper">
                    <div class="address-box">
                        <div class="text-left"><i class="text-green mdi mdi-redo mdi-sm"></i> &nbsp;<span class="text-green text-sm">Spedisci</span></div>
                        <div class="add-text">Simone Chinaglia</div>
                        <div  class="add-text">Via zezio 63</div>
                        <div  class="add-text">22100 Como Italia</div>
                        <div data-toggle="modal" data-target="#editAddress" class="text-right c-pointer"><span class="text-green text-sm ">Modifica</span> &nbsp;<i class="text-green mdi-sm  mdi mdi-wrench"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
          
    <!-- /.modal-edit-address -->
    <div class="modal fade" id="editAddress" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-header-custom">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h5 class="modal-title"><strong>Modifica Indirizzo</strong></h5>
                </div>
                <div class="modal-body modal-header-custom">
                    <p>Utilizza questo form per modifica l'indirizzo, ricordati di cliccare sul botte "Salva" al
                        termine.</p>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group margin-btm-input-lg">
                                <div class="mb-1">
                                    <label for="">Nome e Cognome</label>
                                    <input type="text" class="form-control input-gray profile-input"
                                            placeholder="Scegli una password">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group margin-btm-input-lg">
                                <div class="mb-1">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control input-gray profile-input"
                                            placeholder="Ripeti la password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group custom-p-input margin-btm-input-lg">
                                <div class="mb-1">
                                    <label for="">Numero di cellulare</label>
                                    <input type="text" class="form-control input-gray profile-input"
                                            placeholder="Scrivi il tuo recapito telefonico">
                                </div>
                            </div>
                            <div class="custom-p-logo">
                                <button class="btn bg-green p-form-logo"><i class="mdi mdi-alert-circle-outline"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group margin-btm-input-lg">
                        <div class="mb-1">
                            <label for="Indirizzo">Indirizzo</label>
                            <input type="text" id="Indirizzo" class="form-control input-gray profile-input"
                                    placeholder="Indirizzo riga 1">
                        </div>
                    </div>

                    <div class="form-group margin-btm-input-lg">
                        <div class="mb-1">
                            <input type="text" class="form-control input-gray profile-input"
                                    placeholder="Indirizzo riga 2">
                        </div>
                    </div>

                    <div class="form-group margin-btm-input-lg">
                        <div class="mb-1">
                            <label for="">Città</label>
                            <input type="text" class="form-control input-gray profile-input"
                                    placeholder="Seleziona la città">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group margin-btm-input-lg">
                                <div class="mb-1">
                                    <label for="">Provincia</label>
                                    <input type="text" class="form-control input-gray profile-input"
                                            placeholder="Seleziona la provincia">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group margin-btm-input-lg">
                                <div class="mb-1">
                                    <label for="">Cap</label>
                                    <input type="text" class="form-control input-gray profile-input"
                                            placeholder="Seleziona il cap">
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
        el: '#addressVue',
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
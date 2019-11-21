@extends('User.profile.profileMaster')

@push('cssLib')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@endpush

@section('userContent')
<div id="passChangeVue">
    <div class="state-pass-change">
        <div class="row">
            <div class="col-md-6 mb-5">
                <div class="pass-box">
                    <form action="{{route('profile.singleUpdate')}}" method="post">
                        @csrf
                        <input type="hidden" name="action" value="password">
                        <div class="pass-text-1">Cambia password</div>
                        <div class="form-group margin-btm-input-lg">
                            <div class="input-group mb-1 @error('password') has-danger @enderror">
                                <div class="input-group-addon input-white home-input-group"><i
                                            class="mdi text-ash mdi-md mdi-lock"></i></div>
                                <input type="password" class="form-control input-white home-input"
                                        placeholder="Scegli una password" name="password">
                            </div>
                            @error('password')
                                <small class="text-red">{{ $message }}</small><br>
                            @enderror
                            <small>La password deve essere composta da almeno 8 caratteri</small>
                        </div>
                        <div class="form-group margin-btm-input-lg">
                            <div class="input-group mb-1 @error('password_confirmation') has-danger @enderror">
                                <div class="input-group-addon input-white home-input-group"><i
                                            class="mdi text-ash mdi-md mdi-lock"></i></div>
                                <input type="password" class="form-control input-white home-input"
                                        placeholder="Ripeti la password" name="password_confirmation">
                            </div>
                            @error('password_confirmation')
                                <small class="text-red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-success btn-padding-65">Salva modifiche</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <div class="pass-box">
                    <form action="{{route('profile.singleUpdate')}}" method="post">
                        @csrf
                        <input type="hidden" name="action" value="email">
                        <div class="pass-text-1">Cambia email</div>
                        <div class="form-group margin-btm-input-lg">
                            <div class="input-group mb-1 @error('email') has-danger @enderror">
                                <div class="input-group-addon input-white home-input-group"><i
                                            class="mdi text-ash mdi-md mdi-email"></i></div>
                                <input type="text" class="form-control input-white home-input"
                                        placeholder="Nuovo indirizzo email" name="email">
                            </div>
                            @error('email')
                                <small class="text-red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group mb-25">
                            <div class="input-group mb-1 @error('email_confirmation') has-danger @enderror"></div>
                        </div>
                        <div class="form-group margin-btm-input-lg">
                            <div class="input-group mb-1">
                                <div class="input-group-addon input-white home-input-group"><i
                                            class="mdi text-ash mdi-md mdi-email"></i></div>
                                <input type="text" class="form-control input-white home-input"
                                        placeholder="Conferma nuovo indirizzo email" name="email_confirmation">
                            </div>
                            @error('email_confirmation')
                                <small class="text-red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-success btn-padding-65">Salva modifiche</button>
                        </div>
                    </form>    
                </div>
            </div>
            <div class="col-md-12">
                <div class="margin-30"></div>
                <div class="margin-30"></div>
                <div class="page-text-2">Cancella il mio account</div>
                <div class="margin-30"></div>
                <p class="page-sub-text-2">Attenzione! Questa azione non è reversibile. Accertatevi di voler cancellare davvero l’account, in tal caso andranno perse tutte le informaizoni salvate associate al suo account.</p>
                <p class="page-sub-text-2">Non è possibile nemmeno al team tecnico recuperare l’account in caso di cancellazione accidentale.</p>
                <p class="page-sub-text-2">Per confermare la cancellazione del tuo account, trascina lo slide da sinistra a destra. Al termine, verrai reindirizzato alla homepage e riceverai una mail di conferma all’indirizzo associato all’account.</p>
            </div>
            <div class="col-md-12">
                <div class="margin-30"></div>
                <div class="margin-30"></div>
                <div class="text-center">
                    <div class="range-input">
                        <div class="_progressEmployee">
                            <div class="_prog" :style="{width: rangeValue+'%'}"></div>
                        </div>
                        <input type="range" v-model="rangeValue" class="employeeRange" value="5" min="0" max="100">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    new Vue({
        el: '#passChangeVue',
        data: {
            rangeValue:0
        },
        methods: {
            
        },
        mounted() {
            @if(Session::has('message'))
                swal({
                    icon: 'success',
                    title: 'Successo',
                    text: '{{Session::get('message')}}',
                    timer: 2000
                })
            @endif
        },
    });
</script>
@endpush
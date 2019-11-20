@extends('User.profile.profileMaster')

@section('userContent')
<div id="passChangeVue">
    <div class="state-pass-change">
        <div class="row">
            <div class="col-md-6">
                <div class="pass-box">
                    <div class="pass-text-1">Cambia password</div>
                    <div class="form-group margin-btm-input-lg">
                        <div class="input-group mb-1">
                            <div class="input-group-addon input-white home-input-group"><i
                                        class="mdi text-ash mdi-md mdi-lock"></i></div>
                            <input type="text" class="form-control input-white home-input"
                                    placeholder="Scegli una password">
                        </div>
                        <small>La password deve essere composta da almeno 8 caratteri</small>
                    </div>
                    <div class="form-group margin-btm-input-lg">
                        <div class="input-group mb-1">
                            <div class="input-group-addon input-white home-input-group"><i
                                        class="mdi text-ash mdi-md mdi-lock"></i></div>
                            <input type="text" class="form-control input-white home-input"
                                    placeholder="Ripeti la password">
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button class="btn btn-success btn-padding-65">Salva modifiche</button>
                    </div>
    
                </div>
            </div>
            <div class="col-md-6">
                <div class="pass-box">
                    <div class="pass-text-1">Cambia email</div>
                    <div class="form-group margin-btm-input-lg">
                        <div class="input-group mb-1">
                            <div class="input-group-addon input-white home-input-group"><i
                                        class="mdi text-ash mdi-md mdi-email"></i></div>
                            <input type="text" class="form-control input-white home-input"
                                    placeholder="Nuovo indirizzo email">
                        </div>
                    </div>
                    <div class="form-group mb-25">
                        <div class="input-group mb-1"></div>
                    </div>
                    <div class="form-group margin-btm-input-lg">
                        <div class="input-group mb-1">
                            <div class="input-group-addon input-white home-input-group"><i
                                        class="mdi text-ash mdi-md mdi-email"></i></div>
                            <input type="text" class="form-control input-white home-input"
                                    placeholder="Conferma nuovo indirizzo email">
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <button class="btn btn-success btn-padding-65">Salva modifiche</button>
                    </div>
    
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
            ticket: '',
            rangeValue: 0
        },
        methods: {
            activityChange(activity = 'list') {
                this.$set(this, 'activity', activity);
            },
            ticketCru(action = 'password') {
				var that = this;
				var formData = {
					action: action,
					ticket: this.ticket
				}
				axios.post("{{route('cru.ticket')}}", formData)
				.then(function (response) {
                    if (!response.data.success) return;
					switch (action) {
						case 'create':
							that.tickets.push(response.data.ticket);
                            that.$set(that, 'activity', 'list');
                            that.clear();
                            swal({
                                icon: 'success',
                                title: 'Created',
                                text: 'Successfully created a new ticket!',
                                timer: 1000
                            })
							break;
						case 'update':
							that.$set(that.categories, that.categories.findIndex(c => c.id === that.categoryId), response.data.category);							
							break;
						case 'delete':							
							var tempCategory = that.categories.filter(category => category.id !== that.categoryId); 
							that.$set(that, 'categories', tempCategory);
							break;
					}
				})
				.catch(function (response) {
					// console.log(response.data.errors);
				});
			},

            clear() {
            }
        },
        mounted() {
            this.clear();
        },
    });
</script>
@endpush
@extends('User.profile.profileMaster')

@section('userContent')
<div id="profileVue">
    <div class="state-portfolio">
        <div class="row">
            <div class="col-md-6">
                <div class="pass-box">
                    <div class="text-box">
                        <div class="profile-text-1">Informazioni account</div>
                        <div class="profile-text-2"><span>Mi serve la fattura </span>
                            <span class="toggle-logo">
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </span>
                        </div>
                    </div>
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
                            <div class="custom-p-logo"><button class="btn bg-green p-form-logo"><i class="mdi mdi-alert-circle-outline"></i></button></div>
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
            </div>
            <div class="col-md-6">
                <div class="pass-box">
                    <div class="text-box">
                        <div class="profile-text-1">indirizzo per la fatturazione</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group margin-btm-input-lg">
                                <div class="mb-1">
                                    <label for="">Nome Società</label>
                                    <input type="text" class="form-control input-gray profile-input"
                                            placeholder="Scrivi il nome della società">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group margin-btm-input-lg">
                                <div class="mb-1">
                                    <label for="">Indirizzo PEC</label>
                                    <input type="text" class="form-control input-gray profile-input"
                                            placeholder="Indirizzo PEC">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group margin-btm-input-lg">
                                <div class="mb-1">
                                    <label for="">Codice SDI</label>
                                    <input type="text" class="form-control input-gray profile-input"
                                            placeholder="Codice di interscambio">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group margin-btm-input-lg">
                                <div class="mb-1">
                                    <label for="">Partita iva</label>
                                    <input type="text" class="form-control input-gray profile-input"
                                            placeholder="Partita iva">
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
                            <div class="custom-p-logo"><button class="btn bg-green p-form-logo"><i class="mdi mdi-alert-circle-outline"></i></button></div>
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
            </div>
            <div class="col-sm-12">
                <div class="margin-30"></div>
                <div class="margin-30"></div>
                <div class="text-right">
                    <div class="form-group text-right">
                        <button class="btn btn-success btn-padding-65">Salva modifiche</button>
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
        el: '#profileVue',
        data: {
            ticket: '',
            rangeValue: 0
        },
        methods: {
            activityChange(activity = 'list') {
                this.$set(this, 'activity', activity);
            },
            ticketCru(action) {
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
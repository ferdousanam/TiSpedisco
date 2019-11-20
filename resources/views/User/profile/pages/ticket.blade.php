@extends('User.profile.profileMaster')

@push('cssLib')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@endpush

@section('userContent')
<div id="ticketVue">
    <template v-if="activity=='list'">
        <div class="state-ticket">
            <div class="margin-30"></div>
            <div class="row mb-10">
                <div class="col-md-7 col-sm-8 col-xs-12">
                    <table class="table table-theme">
                        <thead>
                        <tr>
                            <th>S/L</th>
                            <th>Ticket</th>
                            <th>Data</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(ticket, ticketIndex) in tickets">
                            <td>@{{ticketIndex+1}}</td>
                            <td @click="activityChange('single'); setData(ticket)">@{{ticket.title}}</td>
                            <td class="text-ash">@{{moment(ticket.created_at).startOf('hour').fromNow()}}</td>
                            <td class="text-right">
                                <span class="label label-orange" v-if="ticket.state == 'open'">Aperto</span>
                                <span class="label label-green" v-if="ticket.state == 'closed'">Risolto</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-offset-1 col-xs-12 col-md-3 col-sm-4">
                    <button class="btn btn-success w-100" @click="activityChange('create')">Apri un titcket</button>
                    <div class="margin-30"></div>
                    <div class="ticket-box"></div>
                </div>
            </div>
        </div>
    </template>
    <template v-if="activity=='create'">        
        <div class="state-ticket">
            <div class="margin-30"></div>
            <div class="row mb-10">
                <div class="col-md-7 col-sm-8 col-xs-12">
                    <div class="form-group mb-35">
                        <label>Oggetto</label>
                        <input type="text" class="form-control theme-input"
                                placeholder="Scrivi il motivo per cui ci stai contattando" v-model="ticket.title">
                    </div>
                    <div class="form-group mb-35">
                        <label>Scrivi qualcosa</label>
                        <textarea rows="10" class="form-control theme-input"
                                placeholder="Descrivi il problema che hai riscontrato" v-model="ticket.message"></textarea>
                    </div>
                    <label for="ticketFile" type="button" class="btn btn-success"><i class="mdi mdi-sm mdi-paperclip"></i> Carica un file
                    </label>
                    <div class="text-ash small-text mb-5">Massimo 5mb in totale</div>
                    <input type="file" id="ticketFile" ref="ticketFile" style="visibility:hidden" @change="handleFileUpload('ticketFile')">
                    <div class="form-group">
                        <input class="form-check-input styled-checkbox" type="checkbox" value=""
                                id="check-input" v-model="ticket.is_paralyzes">
                        <label for="check-input"> <span class="font-400">Si trova in una situazione che paralizza la sua attività?</span> &nbsp;<i  data-toggle="tooltip" data-placement="bottom"
                                title="La sua richiesta sarà elaborata più rapidamente a condizione che, dopo un'analisi, il suo caso risulti veramente urgente e richieda il nostro intervento per essere sbloccata (gli abusi penalizzano i casi accertati)."
                            class="text-green mdi mdi-clock mdi-sm"></i></label>
                    </div>
                </div>
                <div class="col-md-offset-1 col-xs-12 col-md-3 col-sm-4">
                    <button type="button" class="btn btn-success w-100" @click="activityChange('list')">lista dei biglietti</button>
                    <div class="margin-30"></div>
                    <div class="ticket-box"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <button class="btn btn-success btn-padding-65" @click="ticketCru('create')">Invia ticket</button>
                </div>
            </div>
        </div>
    </template>
    <template v-if="activity=='single'">
        <div class="state-ticket">
            <div class="margin-30"></div>
            <div class="row mb-10">
                <div class="col-md-7 col-sm-8 col-xs-12">
                    <p class=" text-sm"><strong>Oggetto:</strong> @{{ showTicket.title }}</p>
                    <div class="text-sm">@{{ showTicket.message }}</div>
                </div>
                <div class="col-md-offset-1 col-xs-12 col-md-3 col-sm-4">
                    <button type="button" class="btn btn-success w-100" @click="activityChange('list')">lista dei biglietti</button>
                    <div class="margin-30"></div>
                    <div class="ticket-box"></div>
                </div>
            </div>
            <div class="row" v-for="(reply, replyIndex) in showTicket.replies">
                <div class="col-sm-9">
                    <div class="comment-box-ticket mb-5">
                        <div class="row">
                            <div class="col-sm-3">
                               <div class="left-box text-center">
                                   <div class="profile-pic"
                                        style="background-image: url('{{asset('images/home-img/Profile.png')}}')">
                                       <div class="profile-active"></div>
                                   </div>
                                   <div>Luca</div>
                                   <div>Customer Care</div>
                                   <div class="margin-30"></div>
                                   <div>Martedì</div>
                                   <div>15 Agosto 2019,</div>
                                   <div>13.34</div>
                               </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="text-sm">@{{reply.message}}</div>
                                <div class="text-right">
                                    <div class="text-green" @click="showComment(replyIndex)">Rispondi &nbsp; <span><i class="mdi mdi-redo"></i></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-offset-1 col-sm-11">
                            <div class="comment-box-ticket mb-5" v-for="(innerReply, innerReplyIndex) in reply.replies">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="left-box text-center">
                                            <div class="profile-pic"
                                                style="background-image: url('{{asset('images/home-img/Profile.png')}}')">
                                                <div class="profile-active"></div>
                                            </div>
                                            <div>Luca</div>
                                            <div>Customer Care</div>
                                            <div class="margin-30"></div>
                                            <div>Martedì</div>
                                            <div>15 Agosto 2019,</div>
                                            <div>13.34</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="text-sm">@{{innerReply.message}}</div>
                                        <div class="text-right">
                                            <div class="text-green" @click="showComment(replyIndex)">Rispondi &nbsp; <span><i class="mdi mdi-redo"></i></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" v-show="innerReplyBoxes[replyIndex].show == true">
                                <div class="col-sm-12 mb-5">
                                    <div class="form-group">
                                        <textarea name="" id="" cols="30" rows="10" class="form-control input-gray home-input" placeholder="Scrivi qui la tua risposta" v-model="innerReplyBoxes[replyIndex].message"></textarea>
                                    </div>
                                </div>
                               <div class="col-sm-12">
                                   <div class="row">
                                       <div class="col-sm-6">
                                        <label for="replyFile@{{replyIndex}}" type="button" class="btn btn-success"><i class="mdi mdi-sm mdi-paperclip"></i> Carica un file</label>
                                           <div class="text-ash small-text mb-5">Massimo 5mb in totale</div>
                                            <input type="file" id="replyFile@{{replyIndex}}" ref="replyFile@{{replyIndex}}" style="visibility:hidden" @change="handleFileUpload('replyFile')">
                                       </div>
                                       <div class="col-sm-6 text-right">
                                           <button class="btn btn-success btn-padding-65">Rispondi</button>
                                       </div>
                                   </div>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="page-sub-text mb-1"><strong>Rispondi</strong></div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-sm-9">
                    <div class="form-group">
                        <textarea name="" id="" cols="30" rows="10" class="form-control input-gray home-input" placeholder="Scrivi qui la tua risposta"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
               <div class="col-sm-9">
                   <div class="row">
                       <div class="col-sm-6">
                           <button type="button" class="btn btn-success"><i class="mdi mdi-sm mdi-paperclip"></i> Carica un file</button>
                           <div class="text-ash small-text mb-5">Massimo 5mb in totale</div>
                       </div>
                       <div class="col-sm-6 text-right">
                           <button class="btn btn-success btn-padding-65">Rispondi</button>
                       </div>
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
        el: '#ticketVue',
        data: {
            activity: 'list', // list, create, single
            ticket: '',
            tickets: [],
            innerReplyBoxes: [],
            showTicket: '',
            rangeValue: 0
        },
        methods: {
            moment(time) {
                return moment(time).locale("it");
            },
            activityChange(activity = 'list') {
                this.$set(this, 'activity', activity);
            },
            showComment(replyIndex) {
                var computedReplies = this.innerReplyBoxes;
                computedReplies[replyIndex]['show'] = true;
                this.$set(this, 'innerReplyBoxes', []);
                this.$set(this, 'innerReplyBoxes', computedReplies);
            },
            setData(ticket) {
                var replies = ticket.replies;
                this.innerReplyBoxes = [];
                for (let index = 0; index < replies.length; index++) {
                    const reply = replies[index];
                    const replyBox = {
                        ticketId: 1,
                        replyId: 1,
                        message: '',
                        file: '',
                        show: false
                    }
                    this.innerReplyBoxes[index]=replyBox;                                      
                } 
                this.$set(this, 'showTicket', ticket);
            },
            handleFileUpload(file){
                var that = this;
                var ticketFile = this.$refs[file].files[0];
                let formData = new FormData();
                formData.append('file', ticketFile);
                var config = {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }
                axios.post("{{route('user.fileUpload')}}", formData, config)
				.then(function (response) {
                    if (response.data.success) {
                        that.ticket.file = response.data.url;
                        console.log(that.ticket)
                    }
                })
            },
            getAllTickets() {
				var that = this;
				axios.get("{{route('user.getTickets')}}")
				.then(function (response) {
					that.tickets = response.data.tickets;				
                })
                .catch(function (response) {
					// console.log(response.data.errors);
				});
			},
            ticketCru(action = 'create') {
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
                this.ticket = {
                    id: '',
                    title: '',
                    message: '',
                    file: '',
                    is_paralyzes: false
                }
            }
        },
        mounted() {
            this.clear();
            this.getAllTickets();
        },
    });
</script>
@endpush
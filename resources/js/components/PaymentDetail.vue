<template>
  
  <form enctype="multipart/form-data" @submit.prevent="submitForm" method="post">
    

    <div class="theme-page-section theme-page-section-lg">
      <input type="hidden" v-model="order.plan_id" name="order[plan_id]">
      <div class="container">
        <div class="row row-col-static row-col-mob-gap" id="sticky-parent" data-gutter="60">
          <div class="col-md-8 ">
            <div class="theme-payment-page-sections">
              <div class="theme-payment-page-sections-item">
                <div class="theme-search-results-item theme-payment-page-item-thumb">
                  <div class="row" data-gutter="20">

                    <div class="col-md-9 ">
                      <p class="theme-search-results-item-flight-payment-airline">You are flying Indonesia Airlines</p>
                      
                      <div class="form-group">
                          <label>Pilih Jadwal Penerbangan</label>
                          <select class="form-control" name="order[schedule_id]" v-model="order.schedule_id" @change="getSchedule()" required>
                              <option value="">--Pilih Jadwal--</option>
                              <option v-for="schedule in plan.schedules" :value="schedule.id">{{ schedule.name }}</option>
                          </select>
                      </div>
                      
                      <div v-if="schedule.capacity">  
                          <h5 class="theme-search-results-item-title">{{ schedule.name }}, {{ schedule.from }} &nbsp;&rarr;&nbsp; {{ schedule.to }}</h5>
                          <p class="theme-search-results-item-flight-payment-info">Capacity: {{ schedule.capacity }} Persons, {{ schedule.type }}</p>
                          <ul class="theme-search-results-item-flight-payment-dates">
                            <li>Depart: {{ new Date(schedule.start_at).toDateString() }}</li>
                            <li>Return: {{ new Date(schedule.end_at).toDateString() }}</li>
                          </ul>
                          <a class="theme-search-results-item-flight-payment-details-link" href="#FlightPaymentDetails" data-toggle="collapse" aria-expanded="false" aria-controls="FlightPaymentDetails">Flight Details &nbsp;
                            <i class="fa fa-angle-down"></i>
                          </a>
                          <div class="collapse _pt-20" id="FlightPaymentDetails">
                            <div class="theme-search-results-item-flight-detail-items">

                              <div class="theme-search-results-item-flight-details" v-for="schedule_detail in schedule.schedule_details">
                                <div class="row">
                                  <div class="col-md-3 ">
                                    <div class="theme-search-results-item-flight-details-info" v-if="schedule.start_at == schedule_detail.start_at">
                                      <h5 class="theme-search-results-item-flight-details-info-title">Depart</h5>
                                      <p class="theme-search-results-item-flight-details-info-date">Tue, May 23</p>
                                      <p class="theme-search-results-item-flight-details-info-cities">New York &rarr; London</p>
                                      <p class="theme-search-results-item-flight-details-info-fly-time">14h 30m</p>
                                      <p class="theme-search-results-item-flight-details-info-stops">non-stop</p>
                                    </div>
                                    <div class="theme-search-results-item-flight-details-info" v-if="schedule.end_at == schedule_detail.end_at">
                                      <h5 class="theme-search-results-item-flight-details-info-title">Return</h5>
                                      <p class="theme-search-results-item-flight-details-info-date">Tue, May 23</p>
                                      <p class="theme-search-results-item-flight-details-info-cities">New York &rarr; London</p>
                                      <p class="theme-search-results-item-flight-details-info-fly-time">14h 30m</p>
                                      <p class="theme-search-results-item-flight-details-info-stops">non-stop</p>
                                    </div>
                                  </div>
                                  <div class="col-md-9 ">
                                    <div class="theme-search-results-item-flight-details-schedule">
                                      <ul class="theme-search-results-item-flight-details-schedule-list">
                                        <li>
                                          <i class="fa fa-plane theme-search-results-item-flight-details-schedule-icon"></i>
                                          <div class="theme-search-results-item-flight-details-schedule-dots"></div>
                                          <p class="theme-search-results-item-flight-details-schedule-date">Tue, May 23</p>
                                          <div class="theme-search-results-item-flight-details-schedule-time">
                                            <span class="theme-search-results-item-flight-details-schedule-time-item">06:50
                                              <span>am</span>
                                            </span>
                                            <span class="theme-search-results-item-flight-details-schedule-time-separator">&mdash;</span>
                                            <span class="theme-search-results-item-flight-details-schedule-time-item">09:20
                                              <span>pm</span>
                                            </span>
                                          </div>
                                          <p class="theme-search-results-item-flight-details-schedule-fly-time">14h 30m</p>
                                          <div class="theme-search-results-item-flight-details-schedule-destination">
                                            <div class="theme-search-results-item-flight-details-schedule-destination-item">
                                              <p class="theme-search-results-item-flight-details-schedule-destination-title">
                                                <b>LTN</b>Luton
                                              </p>
                                              <p class="theme-search-results-item-flight-details-schedule-destination-city">London</p>
                                            </div>
                                            <div class="theme-search-results-item-flight-details-schedule-destination-separator">
                                              <span>&rarr;</span>
                                            </div>
                                            <div class="theme-search-results-item-flight-details-schedule-destination-item">
                                              <p class="theme-search-results-item-flight-details-schedule-destination-title">
                                                <b>LGA</b>LaGuardia
                                              </p>
                                              <p class="theme-search-results-item-flight-details-schedule-destination-city">New York</p>
                                            </div>
                                          </div>
                                          <ul class="theme-search-results-item-flight-details-schedule-features">
                                            <li>6980 American</li>
                                            <li>Wide-body jet</li>
                                            <li>Boeing 777-300ER</li>
                                          </ul>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>    
                      </div>

                    </div>
                    
                    <div class="col-md-3 ">
                      <div class="theme-search-results-item-img-wrap">
                        <img class="theme-search-results-item-img _mob-h" src="/bookify/img/airline-logo/aa.jpg" alt="Image Alternative text" title="Image Title"/>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="theme-payment-page-sections-item">
                
                <div v-if="userpersons">
                    <h3 class="theme-payment-page-sections-item-title">Select Passenger</h3>
                    <div class="row">
                      <div class="col-md-6 ">
                        <div class="theme-payment-page-form-item form-group">
                          <i class="fa fa-angle-down"></i>
                          <select class="form-control">
                            <option>John Doe, john_doe772@gmail.com, +1 839 322 1329</option>
                            <option>Maya Smith, hello_maya95@yahoo.com, +1 096 337 4451</option>
                            <option>Tommy Jones, tommy238123@gmail.com, +1 285 365 1322</option>
                            <option>Lucy Doe, lucy_kitty_11@gmail.com, +1 732 929 0466</option>
                          </select>
                        </div>
                      </div>
                    </div>
                </div>

                <button class="btn btn-primary" type="button" @click="addPerson()">+ Add New Passenger</button>
                <div class="theme-payment-page-sections-item-new-extend" v-for="(person,p) in order.persons" v-model="order.persons[p]">
                  <div class="theme-payment-page-form">
                    <h3 class="theme-payment-page-form-title">Passenger {{ p+1 }}</h3>
                    <div class="row row-col-gap" data-gutter="20">
                      <div class="col-md-6 ">
                        <div class="row row-col-gap" data-gutter="10">
                          <div class="col-md-12 ">
                            <div class="theme-payment-page-form-item form-group">
                              <input type="date" class="form-control" v-model="order.persons[p].birthdate" :name="'order[persons]['+p+'][birthdate]'" required>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 ">
                        <div class="theme-payment-page-form-item form-group">
                          <i class="fa fa-angle-down"></i>
                          <select class="form-control" v-model="order.persons[p].gender" :name="'order[persons]['+p+'][gender]'" required>
                            <option value="">Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 ">
                        <div class="theme-payment-page-form-item form-group">
                          <input class="form-control" type="text" v-model="order.persons[p].firstname" placeholder="First Name" value="nama" :name="'order[persons]['+p+'][firstname]'" required />
                        </div>
                      </div>
                      <div class="col-md-6 ">
                        <div class="theme-payment-page-form-item form-group">
                          <input class="form-control" type="text" v-model="order.persons[p].lastname" placeholder="Last Name" value="saya" :name="'order[persons]['+p+'][lastname]'" required />
                        </div>
                      </div>
                      <div class="col-md-6 ">
                        <div class="theme-payment-page-form-item form-group">
                          <input class="form-control" type="text" v-model="order.persons[p].identity_number" placeholder="No KTP" value="087" :name="'order[persons]['+p+'][identity_number]'" required />
                        </div>
                      </div>
                      <div class="col-md-6 ">
                        <div class="theme-payment-page-form-item form-group">
                          <input class="form-control" type="email" placeholder="Email" v-model="order.persons[p].email" value="asegaf@ymail.com" :name="'order[persons]['+p+'][email]'" required />
                        </div>
                      </div>
                      <div class="col-md-6 ">
                        <div class="theme-payment-page-form-item form-group">
                          <input class="form-control" type="text" placeholder="Phone" v-model="order.persons[p].phone" value="098123123" :name="'order[persons]['+p+'][phone]'" required />
                        </div>
                      </div>
                      <div class="col-md-6 ">
                        <div class="theme-payment-page-form-item form-group">
                          <input class="form-control" type="text" placeholder="Address" value="Pesanggaran" v-model="order.persons[p].address" :name="'order[persons]['+p+'][address]'" required />
                        </div>
                      </div>
                      <div class="col-md-6 ">
                        <div class="theme-payment-page-form-item form-group">
                          <i class="fa fa-angle-down"></i>
                          <select class="form-control" :name="'order[persons]['+p+'][relation_status]'" v-model="order.persons[p].relation_status" required>
                            <option value="">Status</option>
                            <option value="Lajang">Lajang</option>
                            <option value="Menikah">Menikah</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 ">
                        <div class="theme-payment-page-form-item form-group">
                          <input class="form-control" type="text" placeholder="Pekerjaan" v-model="order.persons[p].profession" value="JOB" :name="'order[persons]['+p+'][profession]'" required />
                        </div>
                      </div>
                      <!-- <div class="col-md-6 ">
                        <div class="theme-payment-page-form-item form-group">
                          <label>Foto KTP</label>
                          <input class="form-control" type="file" placeholder="Foto KTP" :name="'order[persons]['+p+'][identity_image]'" />
                        </div>
                      </div> -->
                    </div>
                    <div v-if="person.passport">
                      <hr>
                      <div class="row">

                        <div class="col-md-6">
                          <div class="theme-payment-page-form-item form-group">
                            <label>Nama Lengkap</label>
                            <input class="form-control" type="text" placeholder="Nama Lengkap" v-model="order.persons[p].passport.name" :name="'order[persons]['+p+'][passport][name]'" required />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="theme-payment-page-form-item form-group">
                            <label>Alamat</label>
                            <input class="form-control" type="text" placeholder="Alamat" :name="'order[persons]['+p+'][passport][address]'" v-model="order.persons[p].passport.address" required />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="theme-payment-page-form-item form-group">
                            <label>Tanggal Terbit</label>
                            <input class="form-control" type="date" placeholder="Tanggal Terbit" :name="'order[persons]['+p+'][passport][release_date]'" v-model="order.persons[p].passport.release_date" required />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="theme-payment-page-form-item form-group">
                            <label>Diterbitkan di</label>
                            <input class="form-control" type="text" placeholder="Diterbitkan di" v-model="order.persons[p].passport.release_at" :name="'order[persons]['+p+'][passport][release_at]'" required />
                          </div>
                        </div>

                      </div>
                    </div>
                    <button type="button" class="btn btn-danger pull-right" @click="removePerson(p)"><i class="fa fa-times"></i> Remove Passenger</button>
                    <button type="button" class="btn btn-info pull-right" @click="addPassport(p)"><i class="fa fa-plane"></i> Add Passport</button>
                  </div>
                </div>
              </div>
              <div class="theme-payment-page-sections-item">
                <div class="theme-payment-page-booking">
                  <div class="theme-payment-page-booking-header">
                    <h3 class="theme-payment-page-booking-title">Total</h3>
                    <p class="theme-payment-page-booking-subtitle">By clicking book now button you agree with terms and conditionals and money back gurantee. Thank you for trusting our service.</p>
                    <p class="theme-payment-page-booking-price">Rp {{ (((plan.price - ((plan.price*plan.discount)/100))*order.persons.length) - (voucher ? voucher.value : 0)).toLocaleString() }}</p>
                  </div>
                  <button class="btn _tt-uc btn-primary-inverse btn-lg btn-block" type="submit">Book Now</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 " v-if="plan.price">
            <div class="sticky-col">
              <div class="theme-sidebar-section _mb-10">
                <h5 class="theme-sidebar-section-title">Booking Summary</h5>
                <ul class="theme-sidebar-section-summary-list">
                  <li>Paket {{ plan.name }}</li>
                  <li>Price: Rp {{ plan.price.toLocaleString() }}/org</li>
                  <li>Discount: {{ plan.discount }}%</li>
                  <li>
                    <input type="text" placeholder="Kode Voucher" v-model="code">
                    <button @click="getVoucher()"><i class="fa fa-search">Cari</i></button>
                  </li>
                  <li v-if="voucher">Terima Potongan Rp {{ voucher.value.toLocaleString() }}</li>
                </ul>
              </div>
              <div class="theme-sidebar-section _mb-10">
                <h5 class="theme-sidebar-section-title">Charges</h5>
                <div class="theme-sidebar-section-charges">
                  <ul class="theme-sidebar-section-charges-list">
                    <li class="theme-sidebar-section-charges-item">
                      <h5 class="theme-sidebar-section-charges-item-title">{{ order.persons.length }} adult</h5>
                      <!-- <p class="theme-sidebar-section-charges-item-subtitle">Economy</p> -->
                      <p class="theme-sidebar-section-charges-item-price">Rp {{ (plan.price*order.persons.length).toLocaleString() }}</p>
                    </li>
                    <li class="theme-sidebar-section-charges-item">
                      <h5 class="theme-sidebar-section-charges-item-title">Discount</h5>
                      <p class="theme-sidebar-section-charges-item-subtitle"></p>
                      <p class="theme-sidebar-section-charges-item-price">- {{ plan.discount }}%</p>
                    </li>
                    <li class="theme-sidebar-section-charges-item" v-if="voucher">
                      <h5 class="theme-sidebar-section-charges-item-title">Voucher</h5>
                      <p class="theme-sidebar-section-charges-item-subtitle"></p>
                      <p class="theme-sidebar-section-charges-item-price">- Rp {{ voucher.value.toLocaleString() }}/org</p>
                      <input type="hidden" name="order[voucher][voucher_id]" value="voucher.id">
                    </li>
                  </ul>
                  <p class="theme-sidebar-section-charges-total">Total
                    <span>Rp {{ (((plan.price - ((plan.price*plan.discount)/100))*order.persons.length) - (voucher ? voucher.value*order.persons.length : 0)).toLocaleString() }}</span>
                  </p>
                  <div class="theme-sidebar-section-charges-total">
                    <select class="form-control" v-model="dp">
                      <option value="false">--Angsur Pembayaran--</option>
                      <option value="true">Ya</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="theme-sidebar-section _mb-10">
                <ul class="theme-sidebar-section-features-list">
                  <li>
                    <h5 class="theme-sidebar-section-features-list-title">Manage your bookings!</h5>
                    <p class="theme-sidebar-section-features-list-body">You're in control of your booking - no registration required.</p>
                  </li>
                  <li>
                    <h5 class="theme-sidebar-section-features-list-title">Customer support available 24/7 worldwide!</h5>
                    <p class="theme-sidebar-section-features-list-body">Website and customer support in English and 41 other languages.</p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </form>
</template>

<script>
    export default {
        props:["plan_id","userpersons"],
        data(){
            return{
                plan:{},
                schedule:{
                  capacity:null
                },
                code:null,
                voucher:null,
                order:{
                  plan_id:2,
                  schedule_id:'',
                  persons:[{
                    gender:'',
                    relation_status:''
                  }]
                },
                dp:'false'
            }
        },
        mounted() {
            console.log('Component mounted.');
            this.order.plan_id = this.plan_id;
            axios.get('/api/plans/'+this.plan_id).then(res=>{
                this.plan = res.data;
            });
        },
        created(){
            
        },
        methods:{
            getSchedule:function(){
                axios.get('/api/schedules/'+this.order.schedule_id).then(res=>{
                    this.schedule = res.data;
                });
            },
            addPerson:function(){
              this.order.persons.push({});
            },
            removePerson:function(index){
              this.order.persons.splice(index,1);
            },
            addPassport:function(index){
              this.order.persons[index].passport = {};
              this.$forceUpdate();
            },
            getVoucher:function(){
                let access = {
                    code:this.code,
                    plan_id:this.plan_id
                };
                axios.post('/api/getvoucher',access).then(res=>{
                    this.voucher = res.data[0] ? res.data[0] : null;
                    console.log(this.voucher);

                    if (this.voucher != null) {
                        Swal({
                          type: 'success',
                          title: 'Voucher ditemukan',
                          showConfirmButton: false,
                          timer: 1500
                        });
                    } else {
                        Swal({
                          title: 'Oppss!',
                          text: 'Kode Salah',
                          type: 'error',
                          showConfirmButton: false,
                          timer: 1500
                        });
                    }

                });
            },
            submitForm:function(){
              let access = {
                order:this.order
              }
              
              this.dp == 'true' ? access.dp = this.dp : delete access.dp;
              this.voucher != null ? access.voucher = this.voucher : delete access.voucher;

              Swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Book it!',
                showLoaderOnConfirm: true,
                preConfirm: ()=> {
                  return axios.post("/payment/checkout",access).then(res=>{
                
                    snap.pay(res.data.snap_token, {
                        // Optional
                        onSuccess: function (result) {
                            Swal({
                              title: 'Success!',
                              text: 'Pembayaran Anda Berhasil',
                              type: 'info',
                              showConfirmButton: false,
                              timer: 3500
                            });
                        },
                        // Optional
                        onPending: function (result) {
                            window.location.replace('/payment/success/'+res.data.order.id);
                        },
                        // Optional
                        onError: function (result) {
                            Swal({
                              title: 'Oppss!',
                              text: 'Terjadi Kesalahan',
                              type: 'error',
                              showConfirmButton: false,
                              timer: 1500
                            });
                        }
                    });

                  }).catch(error=>{
                    Swal.showValidationMessage(
                      // `Request failed: ${error}`
                      'Harap mengisi isian penumpang'
                    )
                  });

                },
                allowOutsideClick: () => !Swal.isLoading()
              });

              
            }
        }
    }
</script>

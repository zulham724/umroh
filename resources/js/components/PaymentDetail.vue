<template>
    <div class="theme-page-section theme-page-section-lg">
      <div class="container">
        <div class="row row-col-static row-col-mob-gap" id="sticky-parent" data-gutter="60">
          <div class="col-md-8 ">
            <div class="theme-payment-page-sections">
              <div class="theme-payment-page-sections-item">
                <div class="theme-search-results-item theme-payment-page-item-thumb">
                  <div class="row" data-gutter="20">

                    <div class="col-md-9 ">
                      <p class="theme-search-results-item-flight-payment-airline">You are flying American Airlines</p>
                      
                      <div class="form-group">
                          <label>Pilih Jadwal Penerbangan</label>
                          <select class="form-control" name="schedule_id" v-model="selected" @change="getSchedule()">
                              <option value="">--Pilih Jadwal--</option>
                              <option v-for="schedule in plan.schedules" :value="schedule.id">{{ schedule.name }}</option>
                          </select>
                      </div>
                      
                      <div v-if="schedule">  
                          <h5 class="theme-search-results-item-title">{{ schedule.name }}, {{ schedule.from }} &nbsp;&rarr;&nbsp; {{ schedule.to }}</h5>
                          <p class="theme-search-results-item-flight-payment-info">Round-trip, {{ schedule.type }}</p>
                          <ul class="theme-search-results-item-flight-payment-dates">
                            <li>Depart: {{ new Date(schedule.start_at).toDateString() }}</li>
                            <li>Return: {{ new Date(schedule.end_at).toDateString() }}</li>
                          </ul>
                          <a class="theme-search-results-item-flight-payment-details-link" href="#FlightPaymentDetails" data-toggle="collapse" aria-expanded="false" aria-controls="FlightPaymentDetails">Flight Details &nbsp;
                            <i class="fa fa-angle-down"></i>
                          </a>
                          <div class="collapse _pt-20" id="FlightPaymentDetails">
                            <div class="theme-search-results-item-flight-detail-items">

                              <div class="theme-search-results-item-flight-details">
                                <div class="row">
                                  <div class="col-md-3 ">
                                    <div class="theme-search-results-item-flight-details-info">
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
                              <div class="theme-search-results-item-flight-details">
                                <div class="row">
                                  <div class="col-md-3 ">
                                    <div class="theme-search-results-item-flight-details-info">
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
                
                <div v-if="persons">
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

                <a class="btn btn-primary" href="#AddNewTraveler" data-toggle="collapse" aria-expanded="false" aria-controls="AddNewTraveler">+ Add New Passenger</a>
                <div class="collapse theme-payment-page-sections-item-new-extend" id="AddNewTraveler">
                  <div class="theme-payment-page-form">
                    <h3 class="theme-payment-page-form-title">Passenger 1</h3>
                    <div class="row row-col-gap" data-gutter="20">
                      <div class="col-md-6 ">
                        <div class="row row-col-gap" data-gutter="10">
                          <div class="col-md-6 ">
                            <div class="theme-payment-page-form-item form-group">
                              <i class="fa fa-angle-down"></i>
                              <select class="form-control">
                                <option>Month</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3 ">
                            <div class="theme-payment-page-form-item form-group">
                              <i class="fa fa-angle-down"></i>
                              <select class="form-control">
                                <option>Day</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3 ">
                            <div class="theme-payment-page-form-item form-group">
                              <i class="fa fa-angle-down"></i>
                              <select class="form-control">
                                <option>Year</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 ">
                        <div class="theme-payment-page-form-item form-group">
                          <i class="fa fa-angle-down"></i>
                          <select class="form-control">
                            <option>Gender</option>
                            <option>Male</option>
                            <option>Female</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 ">
                        <div class="theme-payment-page-form-item form-group">
                          <input class="form-control" type="text" placeholder="First Name"/>
                        </div>
                      </div>
                      <div class="col-md-6 ">
                        <div class="theme-payment-page-form-item form-group">
                          <input class="form-control" type="text" placeholder="Last Name"/>
                        </div>
                      </div>
                      <div class="col-md-6 ">
                        <div class="theme-payment-page-form-item form-group">
                          <input class="form-control" type="text" placeholder="Passport Serial"/>
                        </div>
                      </div>
                      <div class="col-md-6 ">
                        <div class="theme-payment-page-form-item form-group">
                          <i class="fa fa-angle-down"></i>
                          <select class="form-control">
                            <option>Citizenship</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="button" class="btn btn-danger pull-right"><i class="fa fa-times"></i> Remove Passenger</button>
                  </div>
                </div>
              </div>
              <div class="theme-payment-page-sections-item">
                <div class="theme-payment-page-booking">
                  <div class="theme-payment-page-booking-header">
                    <h3 class="theme-payment-page-booking-title">Total</h3>
                    <p class="theme-payment-page-booking-subtitle">By clicking book now button you agree with terms and conditionals and money back gurantee. Thank you for trusting our service.</p>
                    <p class="theme-payment-page-booking-price">$670.00</p>
                  </div>
                  <a class="btn _tt-uc btn-primary-inverse btn-lg btn-block" href="#">Book Now</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 ">
            <div class="sticky-col">
              <div class="theme-sidebar-section _mb-10">
                <h5 class="theme-sidebar-section-title">Booking Summary</h5>
                <ul class="theme-sidebar-section-summary-list">
                  <li>Paket {{ plan.name }}</li>
                  <li>Discount: {{ plan.discount }}%</li>
                  <li>Price: Rp {{ (plan.price - ((plan.price*plan.discount)/100)).toLocaleString() }}/org</li>
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
                      <h5 class="theme-sidebar-section-charges-item-title">1 adult</h5>
                      <p class="theme-sidebar-section-charges-item-subtitle">Economy</p>
                      <p class="theme-sidebar-section-charges-item-price">$615.00</p>
                    </li>
                    <li class="theme-sidebar-section-charges-item">
                      <h5 class="theme-sidebar-section-charges-item-title">Taxes, Fees & Surcharges</h5>
                      <p class="theme-sidebar-section-charges-item-subtitle"></p>
                      <p class="theme-sidebar-section-charges-item-price">$55.00</p>
                    </li>
                  </ul>
                  <p class="theme-sidebar-section-charges-total">Total
                    <span>$670.00</span>
                  </p>
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
</template>

<script>
    export default {
        props:["plan_id","persons"],
        data(){
            return{
                plan:{},
                schedule:null,
                selected:'',
                code:null,
                voucher:null
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            axios.get('/api/plans/'+this.plan_id).then(res=>{
                this.plan = res.data;
            });
        },
        methods:{
            getSchedule:function(){
                axios.get('/api/schedules/'+this.selected).then(res=>{
                    this.schedule = res.data;
                });
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
            }
        }
    }
</script>

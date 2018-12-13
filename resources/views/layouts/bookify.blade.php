<!DOCTYPE HTML>
<html lang="en">
  
<!-- Mirrored from remtsoy.com/tf_templates/tf-bookify-demo/index-7.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Jul 2018 10:43:44 GMT -->
<head>
    <title>Tour Baik</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('bookify/css/font-awesome.css') }}"/>
    <link rel="stylesheet" href="{{ asset('bookify/css/lineicons.css') }}"/>
    <link rel="stylesheet" href="{{ asset('bookify/css/weather-icons.css') }}"/>
    <link rel="stylesheet" href="{{ asset('bookify/css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ asset('bookify/css/styles.css') }}"/>
    <style type="text/css">
      .panel
      {
          text-align: center;
      }
      .panel:hover { box-shadow: 0 1px 5px rgba(0, 0, 0, 0.4), 0 1px 5px rgba(130, 130, 130, 0.35); }
      .panel-body
      {
          padding: 0px;
          text-align: center;
      }

      .the-price
      {
          background-color: rgba(220,220,220,.17);
          box-shadow: 0 1px 0 #dcdcdc, inset 0 1px 0 #fff;
          padding: 20px;
          margin: 0;
      }

      .the-price h1
      {
          line-height: 1em;
          padding: 0;
          margin: 0;
      }

      .subscript
      {
          font-size: 25px;
      }

      /* CSS-only ribbon styles    */
      .cnrflash
      {
          /*Position correctly within container*/
          position: absolute;
          top: -9px;
          right: 4px;
          z-index: 1; /*Set overflow to hidden, to mask inner square*/
          overflow: hidden; /*Set size and add subtle rounding      to soften edges*/
          width: 100px;
          height: 100px;
          border-radius: 3px 5px 3px 0;
      }
      .cnrflash-inner
      {
          /*Set position, make larger then      container and rotate 45 degrees*/
          position: absolute;
          bottom: 0;
          right: 0;
          width: 145px;
          height: 145px;
          -ms-transform: rotate(45deg); /* IE 9 */
          -o-transform: rotate(45deg); /* Opera */
          -moz-transform: rotate(45deg); /* Firefox */
          -webkit-transform: rotate(45deg); /* Safari and Chrome */
          -webkit-transform-origin: 100% 100%; /*Purely decorative effects to add texture and stuff*/ /* Safari and Chrome */
          -ms-transform-origin: 100% 100%;  /* IE 9 */
          -o-transform-origin: 100% 100%; /* Opera */
          -moz-transform-origin: 100% 100%; /* Firefox */
          background-image: linear-gradient(90deg, transparent 50%, rgba(255,255,255,.1) 50%), linear-gradient(0deg, transparent 0%, rgba(1,1,1,.2) 50%);
          background-size: 4px,auto, auto,auto;
          background-color: #aa0101;
          box-shadow: 0 3px 3px 0 rgba(1,1,1,.5), 0 1px 0 0 rgba(1,1,1,.5), inset 0 -1px 8px 0 rgba(255,255,255,.3), inset 0 -1px 0 0 rgba(255,255,255,.2);
      }
      .cnrflash-inner:before, .cnrflash-inner:after
      {
          /*Use the border triangle trick to make         it look like the ribbon wraps round it's        container*/
          content: " ";
          display: block;
          position: absolute;
          bottom: -16px;
          width: 0;
          height: 0;
          border: 8px solid #800000;
      }
      .cnrflash-inner:before
      {
          left: 1px;
          border-bottom-color: transparent;
          border-right-color: transparent;
      }
      .cnrflash-inner:after
      {
          right: 0;
          border-bottom-color: transparent;
          border-left-color: transparent;
      }
      .cnrflash-label
      {
          /*Make the label look nice*/
          position: absolute;
          bottom: 0;
          left: 0;
          display: block;
          width: 100%;
          padding-bottom: 5px;
          color: #fff;
          text-shadow: 0 1px 1px rgba(1,1,1,.8);
          font-size: 0.95em;
          font-weight: bold;
          text-align: center;
      }
    </style>
  </head>
  <body data-spy="scroll" data-target=".navbar" data-offset="50">
    <nav class="navbar navbar-default navbar-inverse navbar-theme navbar-fixed-top" id="main-nav">
      <div class="container">
        <div class="navbar-inner nav">
          <div class="navbar-header">
            <button class="navbar-toggle collapsed" data-target="#navbar-main" data-toggle="collapse" type="button" area-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
              <img src="{{ asset('bookify/img/logo.png') }}" alt="Image Alternative text" title="Image Title"/>
            </a>
          </div>
          <div class="collapse navbar-collapse smoothscroll" id="navbar-main">
            <ul class="nav navbar-nav">
              <li>
                <a href="#home">Home</a>
              </li>
              <li>
                <a href="#pricing">Pricing</a>
              </li>
              <li>
                <a href="#destination">Destination</a>
              </li>
              <li>
                <a href="#about">About</a>
              </li>
              {{-- @foreach ($menuitems as $menuitem)
                <li>
                  <a href="{{ $menuitem->link }}">{{ $menuitem->name }}</a>
                </li>
              @endforeach --}}
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="#"><i class="fa fa-phone"></i> +6289 6821 69754</a>
              </li>
              <li>
                <a href="#"><i class="fa fa-wechat"></i> Live Chat</a>
              </li>
              <li class="dropdown">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <span class="_desk-h">Currency</span>
                  <b>USD</b>
                </a>
                <div class="dropdown-menu dropdown-menu-xxl">
                  <h5 class="dropdown-meganav-select-list-title">Popular Currencies</h5>
                  <div class="row" data-gutter="10">
                    <div class="col-md-3">
                      <ul class="dropdown-meganav-select-list-currency">
                        <li>
                          <a href="#">
                            <span>€</span>Euro
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>£</span>Pound sterling
                          </a>
                        </li>
                        <li class="active">
                          <a href="#">
                            <span>US$</span>U.S. dollar
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-3">
                      <ul class="dropdown-meganav-select-list-currency">
                        <li>
                          <a href="#">
                            <span>CAD</span>Canadian dollar
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>AUD</span>Australian dollar
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>RUB</span>Russian Ruble
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-3">
                      <ul class="dropdown-meganav-select-list-currency">
                        <li>
                          <a href="#">
                            <span>S$</span>Singapore dollar
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>CNY</span>Chinese yuan
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>¥</span>Japanese yen
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <hr/>
                  <h5 class="dropdown-meganav-select-list-title">All Currencies</h5>
                  <div class="row" data-gutter="10">
                    <div class="col-md-3">
                      <ul class="dropdown-meganav-select-list-currency">
                        <li>
                          <a href="#">
                            <span>AR$</span>Argentine peso
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>AUD</span>Australian dollar
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>AZN</span>Azerbaijan, New Ma...
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>BHD</span>Bahrain dinar
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>BRL</span>Brazilian real
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>BGN</span>Bulgarian lev
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>CAD</span>Canadian dollar
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>XOF</span>CFA Franc BCEAO
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>CL$</span>Chilean peso
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>CNY</span>Chinese yuan
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>COP</span>Colombian peso
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>Kč</span>Czech koruna
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>DKK</span>Danish krone
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-3">
                      <ul class="dropdown-meganav-select-list-currency">
                        <li>
                          <a href="#">
                            <span>EGP</span>Egyptian pound
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>€</span>Euro
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>FJD</span>Fijian dollar
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>GEL</span>Georgian lari
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>HK$</span>Hong Kong Dollar
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>HUF</span>Hungarian forint
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>Rs.</span>Indian rupee
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>Rp</span>Indonesian rupiah
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>₪</span>Israeli new sheqel
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>¥</span>Japanese yen
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>JOD</span>Jordanian dinar
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>KZT</span>Kazakhstani tenge
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>KRW</span>Korean won
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-3">
                      <ul class="dropdown-meganav-select-list-currency">
                        <li>
                          <a href="#">
                            <span>KWD</span>Kuwaiti dinar
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>MYR</span>Malaysian ringgit
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>MXN</span>Mexican peso
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>MDL</span>Moldovan leu
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>NAD</span>Namibian Dollar
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>TWD</span>New Taiwan Dollar
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>NZD</span>New Zealand dollar
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>NOK</span>Norwegian krone
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>OMR</span>Omani rial
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>zł</span>Polish zloty
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>£</span>Pound sterling
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>QAR</span>Qatar riyal
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>lei</span>Romanian new leu
                          </a>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-3">
                      <ul class="dropdown-meganav-select-list-currency">
                        <li>
                          <a href="#">
                            <span>RUB</span>Russian Ruble
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>SAR</span>Saudi Arabian riyal
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>S$</span>Singapore dollar
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>ZAR</span>South African rand
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>SEK</span>Swedish krona
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>CHF</span>Swiss franc
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>THB</span>Thai baht
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>TL</span>Turkish lira
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>AED</span>U.A.E. dirham
                          </a>
                        </li>
                        <li class="active">
                          <a href="#">
                            <span>US$</span>U.S. dollar
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>UAH</span>Ukraine Hryvnia
                          </a>
                        </li>
                        <li>
                          <a href="#">
                            <span>UZS</span>Uzbekistan, Sums
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </li>
              <li class="navbar-nav-item-user dropdown">
                <a class="dropdown-toggle" href="account.html" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-user-circle-o navbar-nav-item-user-icon"></i>My Account
                </a>
                <ul class="dropdown-menu">
                  @guest
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('backpack.auth.login') }}">{{ __('Login') }}</a>
                      </li>
                      @if (Route::has('register'))
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('backpack.auth.register') }}">{{ __('Register') }}</a>
                          </li>
                      @endif
                  @else
                      <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->name }} <span class="caret"></span>
                          </a>

                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="{{ route('backpack.auth.logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('backpack.auth.logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form>
                          </div>
                      </li>
                  @endguest
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    @yield('content')
    <div class="theme-footer" id="mainFooter">
      <div class="container _ph-mob-0">
        <div class="row row-eq-height row-mob-full" data-gutter="60">
          <div class="col-md-3">
            <div class="theme-footer-section theme-footer-">
              <a class="theme-footer-brand _mb-mob-30" href="#">
                <img src="{{ asset('bookify/img/logo-black.png') }}" alt="Image Alternative text" title="Image Title"/>
              </a>
              <div class="theme-footer-brand-text">
                <p>Fringilla magnis nunc netus proin a massa ornare ornare cursus odio diam cubilia sapien nam</p>
                <p>Semper non volutpat metus aliquam gravida cum inceptos et nunc cras quisque magnis convallis litora</p>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="row">
              <div class="col-md-4">
                <div class="theme-footer-section theme-footer-">
                  <h5 class="theme-footer-section-title">Travel Mate</h5>
                  <ul class="theme-footer-section-list">
                    <li>
                      <a href="#">About Travel Mate</a>
                    </li>
                    <li>
                      <a href="#">Mobile App</a>
                    </li>
                    <li>
                      <a href="#">Customer Support</a>
                    </li>
                    <li>
                      <a href="#">Advertising</a>
                    </li>
                    <li>
                      <a href="#">Jobs</a>
                    </li>
                    <li>
                      <a href="#">Privacy Policy</a>
                    </li>
                    <li>
                      <a href="#">Terms of Use</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-4">
                <div class="theme-footer-section theme-footer-">
                  <h5 class="theme-footer-section-title">Explore</h5>
                  <ul class="theme-footer-section-list">
                    <li>
                      <a href="#">Countries</a>
                    </li>
                    <li>
                      <a href="#">Regions</a>
                    </li>
                    <li>
                      <a href="#">Cities</a>
                    </li>
                    <li>
                      <a href="#">Districs</a>
                    </li>
                    <li>
                      <a href="#">Airports</a>
                    </li>
                    <li>
                      <a href="#">Hotels</a>
                    </li>
                    <li>
                      <a href="#">Places of Interest</a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-4">
                <div class="theme-footer-section theme-footer-">
                  <h5 class="theme-footer-section-title">Book</h5>
                  <ul class="theme-footer-section-list">
                    <li>
                      <a href="#">Apartments</a>
                    </li>
                    <li>
                      <a href="#">Resorts</a>
                    </li>
                    <li>
                      <a href="#">Villas</a>
                    </li>
                    <li>
                      <a href="#">Hostels</a>
                    </li>
                    <li>
                      <a href="#">B&Bs</a>
                    </li>
                    <li>
                      <a href="#">Guesthouses</a>
                    </li>
                    <li>
                      <a href="#">Hotel Chains</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="theme-footer-section theme-footer-section-subscribe bg-grad _mt-mob-30">
              <div class="theme-footer-section-subscribe-bg" style="background-image:url({{ asset('bookify/img/footer/footer_subscribe_bg.png') }});"></div>
              <div class="theme-footer-section-subscribe-content">
                <h5 class="theme-footer-section-title">Save up to 50% off your next trip</h5>
                <p class="text-muted">Subscribe to unlock our secret deals</p>
                <form>
                  <div class="form-group">
                    <input class="form-control theme-footer-subscribe-form-control" type="email" placeholder="Type your e-mail here"/>
                  </div>
                  <button class="btn btn-primary-invert btn-shadow text-upcase theme-footer-subscribe-btn" type="submit">Get deals</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="theme-copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <p class="theme-copyright-text">Copyright &copy; 2018
              <a href="#">Bookify</a>. All rights reserved.
            </p>
          </div>
          <div class="col-md-6">
            <ul class="theme-copyright-social">
              <li>
                <a class="fa fa-facebook" href="#"></a>
              </li>
              <li>
                <a class="fa fa-google" href="#"></a>
              </li>
              <li>
                <a class="fa fa-twitter" href="#"></a>
              </li>
              <li>
                <a class="fa fa-youtube-play" href="#"></a>
              </li>
              <li>
                <a class="fa fa-instagram" href="#"></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ asset('bookify/js/jquery.js') }}"></script>
    <script src="{{ asset('bookify/js/moment.js') }}"></script>
    <script src="{{ asset('bookify/js/bootstrap.js') }}"></script>
    <script async defer src="{{ asset('bookify/https://maps.googleapis.com/maps/api/js?key=AIzaSyDYeBBmgAkyAN_QKjAVOiP_kWZ_eQdadeI&amp;callback=initMap&amp;libraries=places') }}"></script>
    <script src="{{ asset('bookify/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('bookify/js/blur-area.js') }}"></script>
    <script src="{{ asset('bookify/js/icheck.js') }}"></script>
    <script src="{{ asset('bookify/js/gmap.js') }}"></script>
    <script src="{{ asset('bookify/js/magnific-popup.js') }}"></script>
    <script src="{{ asset('bookify/js/ion-range-slider.js') }}"></script>
    <script src="{{ asset('bookify/js/sticky-kit.js') }}"></script>
    <script src="{{ asset('bookify/js/smooth-scroll.js') }}"></script>
    <script src="{{ asset('bookify/js/fotorama.js') }}"></script>
    <script src="{{ asset('bookify/js/bs-datepicker.js') }}"></script>
    <script src="{{ asset('bookify/js/typeahead.js') }}"></script>
    <script src="{{ asset('bookify/js/quantity-selector.js') }}"></script>
    <script src="{{ asset('bookify/js/countdown.js') }}"></script>
    <script src="{{ asset('bookify/js/window-scroll-action.js') }}"></script>
    <script src="{{ asset('bookify/js/fitvid.js') }}"></script>
    <script src="{{ asset('bookify/js/youtube-bg.js') }}"></script>
    <script src="{{ asset('bookify/js/custom.js') }}"></script>
    <script type="text/javascript">
      $('body').scrollspy({target: ".navbar", offset: 50});

      // Add smooth scrolling on all links inside the navbar
      $(".smoothscroll a").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {

          // Prevent default anchor click behavior
          event.preventDefault();

          // Store hash
          var hash = this.hash;

          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function(){

          // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
          });

        } // End if

      });
    </script>
  </body>

<!-- Mirrored from remtsoy.com/tf_templates/tf-bookify-demo/index-7.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Jul 2018 10:44:14 GMT -->
</html>
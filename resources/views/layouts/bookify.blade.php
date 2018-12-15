<!DOCTYPE HTML>
<html lang="en">
  
<!-- Mirrored from remtsoy.com/tf_templates/tf-bookify-demo/index-7.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Jul 2018 10:43:44 GMT -->
<head>
    <title>Tour Baik</title>
    <meta charset="UTF-8"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('bookify/css/font-awesome.css') }}"/>
    <link rel="stylesheet" href="{{ asset('bookify/css/lineicons.css') }}"/>
    <link rel="stylesheet" href="{{ asset('bookify/css/weather-icons.css') }}"/>
    <link rel="stylesheet" href="{{ asset('bookify/css/bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ asset('bookify/css/styles.css') }}"/>
    @yield('css')
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
                <a href="{{ Request::is('/') ? '#home' : '/' }}">Home</a>
              </li>
              <li>
                <a href="{{ Request::is('/') ? '#pricing' : '/' }}">Pricing</a>
              </li>
              <li>
                <a href="{{ Request::is('/') ? '#destination' : '/' }}">Destination</a>
              </li>
              <li>
                <a href="{{ Request::is('/') ? '#about' : '/' }}">About</a>
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
              <li class="navbar-nav-item-user dropdown">
                <a class="dropdown-toggle" href="account.html" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-user-circle-o navbar-nav-item-user-icon"></i> {{ Auth::check() ? Auth::user()->name : 'My Account' }}
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
                      <li class="nav-item">

                          <a href="{{ route('backpack.auth.logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('backpack.auth.logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </li>
                  @endguest
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <section id="app" style="padding-top: 40px">
      @yield('content')

      <div class="chat-window">
        <chat-component></chat-component>
      </div>

    </section>
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
              <div class="col-md-6">
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
              <div class="col-md-6">
                <div class="theme-footer-section theme-footer-">
                  <h5 class="theme-footer-section-title">Explore</h5>
                  <ul class="theme-footer-section-list">
                    @foreach ($menuitems as $menuitem)
                      <li>
                        <a href="{{ $menuitem->link }}">{{ $menuitem->name }}</a>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="theme-footer-section theme-footer-section-subscribe bg-grad _mt-mob-30">
              <div class="theme-footer-section-subscribe-bg" style="background-image:url({{ asset('bookify/img/footer/footer_subscribe_bg.png') }});"></div>
              <div class="theme-footer-section-subscribe-content">
                <h5 class="theme-footer-section-title">Dapatkan informasi terbaru dari kami</h5>
                <p class="text-muted">Subscribe Email anda</p>
                <form>
                  <div class="form-group">
                    <input class="form-control theme-footer-subscribe-form-control" type="email" placeholder="Type your e-mail here"/>
                  </div>
                  <button class="btn btn-primary-invert btn-shadow text-upcase theme-footer-subscribe-btn" type="submit">Subscribe</button>
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
    <script src="{{ asset('js/app.js') }}"></script>
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
    @yield('script')
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
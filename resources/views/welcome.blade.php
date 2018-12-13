@extends('layouts.bookify')

@section('css')

@endsection

@section('content')
<div class="owl-carousel owl-carousel-no-nav smoothscroll" data-items="1" data-loop="true" data-nav="true" data-autoplay="3000" id="home">
  @foreach ($sliders as $slider)  
    <div class="theme-hero-area _h-75vh">
      <div class="theme-hero-area-bg-wrap">
        <div class="theme-hero-area-bg" style="background-image:url({{ asset($slider->image_url) }});"></div>
        <div class="theme-hero-area-mask theme-hero-area-mask-strong"></div>
      </div>
      <div class="theme-hero-area-body theme-hero-area-body-vert-center">
        <div class="container">
          <div class="theme-hero-text _pt-50 theme-hero-text-center theme-hero-text-white">
            <div class="theme-hero-text-header">
              <h2 class="theme-hero-text-title _mb-10 theme-hero-text-title-xl">{{ $slider->name }}</h2>
              <p class="theme-hero-text-subtitle">{{ $slider->description }}</p>
            </div>
            <a class="btn _tt-uc _mt-20 btn-white btn-ghost btn-lg" href="#pricing">See More</a>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>
<div class="theme-page-section theme-page-section-gray">
  <div class="container">
    <div class="row row-col-mob-gap" data-gutter="60">
      <div class="col-md-3 ">
        <div class="feature feature-white feature-center">
          <i class="feature-icon _bsh _bsh-light feature-icon-gray feature-icon-box feature-icon-round fa fa-globe"></i>
          <div class="feature-caption">
            <h5 class="feature-title">Explore the World</h5>
            <p class="feature-subtitle">Start to discrover. We will help you to visit any place you can imagine</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 ">
        <div class="feature feature-white feature-center">
          <i class="feature-icon _bsh _bsh-light feature-icon-gray feature-icon-box feature-icon-round fa fa-gift"></i>
          <div class="feature-caption">
            <h5 class="feature-title">Gifts & Rewards</h5>
            <p class="feature-subtitle">Get even more from our service. Spend less and travel more</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 ">
        <div class="feature feature-white feature-center">
          <i class="feature-icon _bsh _bsh-light feature-icon-gray feature-icon-box feature-icon-round fa fa-credit-card"></i>
          <div class="feature-caption">
            <h5 class="feature-title">Best prices</h5>
            <p class="feature-subtitle">We are comparing hundreds travel websites to find best price for you</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 ">
        <div class="feature feature-white feature-center">
          <i class="feature-icon _bsh _bsh-light feature-icon-gray feature-icon-box feature-icon-round fa fa-comments-o"></i>
          <div class="feature-caption">
            <h5 class="feature-title">27/7 Support</h5>
            <p class="feature-subtitle">Contact us anytime, anywhere. We will resolve any issues ASAP</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="theme-hero-area" id="pricing">
  <div class="theme-hero-area-bg-wrap">
    <div class="theme-hero-area-bg ws-action" style="background-image:url({{ asset('bookify/img/o14abktz5iy_1500x800.jpg') }});" data-parallax="true"></div>
    <div class="theme-hero-area-mask theme-hero-area-mask-half"></div>
  </div>
  <div class="theme-hero-area-body">
    <div class="theme-page-section theme-page-section-xxl">
      <div class="container">
        <div class="row">
            @foreach ($plans as $plan)
              <div class="col-xs-12 col-md-4">
                  <div class="panel panel-info">
                      <div class="cnrflash">
                          <div class="cnrflash-inner">
                              <span class="cnrflash-label">Diskon
                                  <br>
                                  {{ $plan->discount }}%</span>
                          </div>
                      </div>
                      <div class="panel-heading">
                          <h3 class="panel-title">
                              {{ $plan->name }}</h3>
                      </div>
                      <div class="panel-body">
                          <div class="the-price">
                              <h1>
                                  Rp. {{ number_format($plan->price - (($plan->price*$plan->discount)/100),0,".",".") }}<span class="subscript">/org</span></h1>
                              <strike><small>Rp. {{ number_format($plan->price,0,".",".") }}/org</small></strike>
                          </div>
                          <table class="table table-striped">
                              @foreach ($plan['plan_features'] as $plan_feature)
                                <tr>
                                    <td>
                                        <i class="fa fa-check" style="color:green"></i> {{ $plan_feature->name }}
                                    </td>
                                </tr>
                              @endforeach
                          </table>
                      </div>
                      <div class="panel-footer">
                          <form method="post" action="{{ route('payment.detail') }}">
                            @csrf
                            <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                            <a href="http://www.jquery2dotnet.com" type="submit" class="btn btn-success" role="button">Pilih Sekarang</a> 
                          </form>
                          @if($plan->vouchers_count > 0)
                            Free {{ $plan->vouchers_count }} Voucher Available
                          @endif
                      </div>
                  </div>
              </div>  
            @endforeach
        </div>
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="theme-hero-text theme-hero-text-white theme-hero-text-center">
              <div class="theme-hero-text-header">
                <h2 class="theme-hero-text-title">Why pay more?</h2>
                <p class="theme-hero-text-subtitle">Subscribe now and unlock our secret deals. Save up to 70% by getting access to our special offers for hotels, flights, cars, vacation rentals and travel experiences.</p>
              </div>
              <a class="btn _tt-uc _mt-20 btn-white btn-ghost btn-lg" href="{{ route('backpack.auth.register') }}">Sign Up Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="theme-page-section theme-page-section-xxl theme-page-section-gray" id="destination">
  <div class="container">
    <div class="theme-page-section-header">
      <h5 class="theme-page-section-title">Explore the World</h5>
      <p class="theme-page-section-subtitle">Urna maecenas proin magna suspendisse vulputate porttitor parturient</p>
    </div>
    <div class="row row-col-gap" data-gutter="30">
      @foreach ($menuitems as $menuitem)  
        <div class="col-md-3 ">
          <div class="banner _h-45vh _br-4 _bsh-xl _bsh-light banner-animate banner-animate-zoom-in banner-animate-very-slow">
            <div class="banner-bg" style="background-image:url({{ asset($menuitem->image_url) }});"></div>
            <a class="banner-link" href="{{ $menuitem->link }}"></a>
            <div class="banner-caption _ph-20 _pv-15 _bg-w banner-caption-top banner-caption-dark">
              <h5 class="banner-title">{{ $menuitem->name }}</h5>
              <p class="banner-subtitle _mt-5 _fw-n">{{ $menuitem->description }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
<div class="theme-hero-area" id="about">
  <div class="theme-hero-area-bg-wrap">
    <div class="theme-hero-area-bg" style="background-image:url({{ asset('bookify/img/-p4e59r092q_1500x800.jpg') }});"></div>
    <div class="theme-hero-area-mask theme-hero-area-mask-half"></div>
  </div>
  <div class="theme-hero-area-body">
    <div class="container">
      <div class="theme-page-section _p-0">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="theme-mobile-app">
              <div class="row">
                <div class="col-md-6">
                  <div class="theme-mobile-app-section"></div>
                </div>
                <div class="col-md-6">
                  <div class="theme-mobile-app-section">
                    <div class="theme-mobile-app-body">
                      <div class="theme-mobile-app-header">
                        <h2 class="theme-mobile-app-title">About Us</h2>
                        <p class="theme-mobile-app-subtitle">Our Company CV Ardata Media</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')

@endsection
@extends('layouts.bookify')
@section('css')

@endsection
@section('content')
<div class="theme-hero-area theme-hero-area-half">
  <div class="theme-hero-area-bg-wrap">
    <div class="theme-hero-area-bg" style="background-image:url({{ asset('bookify/img/activity-adult-beach-beautiful-378152_1500x800.jpg') }});"></div>
    <div class="theme-hero-area-mask theme-hero-area-mask-half"></div>
    <div class="theme-hero-area-inner-shadow"></div>
  </div>
  <div class="theme-hero-area-body">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2 theme-page-header-abs">
          <div class="theme-page-header theme-page-header-lg">
            <h1 class="theme-page-header-title">Discover Umroh</h1>
            <p class="theme-page-header-subtitle">The Story of Our Company</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="theme-page-section theme-page-section-xl theme-page-section-gray">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="theme-about-us">
          <div class="theme-about-us-section sticky-parent">
            <div class="row row-col-static row-col-reverse">
              <div class="col-md-4">
                <div class="sticky-cols">
                  <h4 class="theme-about-us-section-title">About</h4>
                </div>
              </div>
              <div class="col-md-8">
                <div class="theme-about-us-section-body">
                  {!! $page->content !!}
                  <div class="theme-about-us-section-gallery">
                    <div class="row" data-gutter="10">
                      <div class="col-xs-12">
                        <div class="banner theme-about-us-section-gallery-img theme-about-us-section-gallery-img-lg banner-">
                          <div class="banner-bg" style="background-image:url({{ asset('bookify/img/adult-book-business-cactus-297755_555x200.jpg') }});"></div>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="banner theme-about-us-section-gallery-img theme-about-us-section-gallery-img-lg banner-">
                          <div class="banner-bg" style="background-image:url({{ asset('bookify/img/plate-flight-sky-sunset_280x205.jpg') }});"></div>
                        </div>
                      </div>
                      <div class="col-xs-6">
                        <div class="banner theme-about-us-section-gallery-img theme-about-us-section-gallery-img-lg banner-">
                          <div class="banner-bg" style="background-image:url({{ asset('bookify/img/woman-wearing-bikini-jumping-to-the-beach-191741_280x205.jpg') }});"></div>
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
</div>
@endsection
@section('script')

@endsection
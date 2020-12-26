@extends('layouts.app')
@section('title', 'Services')
@section('content')
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2><strong> OUR PRODUCT</strong></h2>
                <p>Herbal & Natural</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box iconbox-blue" style="width: 27rem;">
                        <div class="icon">
                            <img src="{{ asset('public/assets/ourImages/ourproduct/OUR PRODUCT web_files/image001.jpg') }}" class="img-thumbnail" alt="..." height="100px">
                        </div>
                        <h4><a href="">Personal care</a></h4>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box iconbox-orange " style="width: 27rem;">
                        <div class="icon">
                            <img src="{{ asset('public/assets/ourImages/ourproduct/OUR PRODUCT web_files/image003.jpg') }}" class="img-thumbnail" alt="..." height="100px">
                        </div>
                        <h4><a href="">Health care</a></h4>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box iconbox-pink" style="width: 27rem;">
                        <div class="icon">
                            <img src="{{ asset('public/assets/ourImages/ourproduct/OUR PRODUCT web_files/image005.jpg') }}" class="img-thumbnail" alt="..." height="100px">
                        </div>
                        <h4><a href="">Beauty care</a></h4>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box iconbox-yellow" style="width: 27rem;">
                        <div class="icon">
                            <img src="{{ asset('public/assets/ourImages/ourproduct/OUR PRODUCT web_files/image008.jpg') }}" class="img-thumbnail" alt="..." height="100px">
                        </div>
                        <h4><a href="">Agro care</a></h4>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box iconbox-red" style="width: 27rem;">
                        <div class="icon">
                            <img src="{{ asset('public/assets/ourImages/ourproduct/OUR PRODUCT web_files/image010.jpg') }}" class="img-thumbnail" alt="..." height="100px">
                        </div>
                        <h4><a href="">Home care</a></h4>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box iconbox-teal" style="width: 27rem;">
                        <div class="icon">
                            <img src="{{ asset('public/assets/ourImages/ourproduct/OUR PRODUCT web_files/image012.jpg') }}" class="img-thumbnail" alt="..." height="100px">
                        </div>
                        <h4><a href="">Animal care</a></h4>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Services Section -->
@endsection

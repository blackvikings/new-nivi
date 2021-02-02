@php
    //dd($product->toArray());
@endphp
@extends('layouts.app')
@section('title', 'Product detail')
@push('css')
    <link href="https://unpkg.com/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <!--<script src="js/jquery-1.9.1.min.js"></script>-->
    <link href="{{ asset('public/src/jquery.exzoom.css') }}" rel="stylesheet" type="text/css"/>
    <style>
        #exzoom {
            width: 300px;
            /*height: 400px; */
        }
        .hidden { display: none; }
    </style>
@endpush
@section('content')
    <section id="contact" class="contact">
      <div class="container">
        <div class="row mt-2 card shadow" data-aos="fade-up">
          <div class="row p-3">
                <div class="col-lg-4">
                          <div class="hel">
                            <div class="exzoom hidden" id="exzoom">
                                <div class="exzoom_img_box">
                                    <ul class='exzoom_img_ul'>
                                        @php
                                            $images = $product->image;
                                        @endphp
                                        @for($i = 0; $i < count($images); $i++)
                                        <li><img src="{!! asset('storage/app/public/'.$images[$i]) !!}" class="img-fluid" /></li>
                                        @endfor
                                    </ul>
                                </div>
                                <div class="exzoom_nav"></div>
                                <p class="exzoom_btn">
                                    <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                                    <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                                </p>
                            </div>
                          </div>
                          <div class="row pt-2">
                            <div class="col-sm-11">
                              <button type="button" class="btn btn-success btn-sm">Buy Now</button>
                            </div>
                          </div>
                        <div class="pt-3"></div>
                </div>


                <div class="col-lg-8">
                  <h6>{{ $product->name }}</h6>
                  <h5 class="pt-2" style="color: green;">&#8377;{{ $product->price }}</h5>
                      <div class="row pt-2">
                        <div class="col-md-2 col-xs-2" style="font-weight: 600">Quantity</div>
                        <div class="col-md-1 col-xs-2">1L</div>
                      </div>

                       <div class="row pt-2">
                        <div class="col-md-2 col-xs-2" style="font-weight: 600">Description</div>
                        <div class="col-md-8 col-xs-6"> {{ $product->description }} </div>
                      </div>
                </div>
            </div>  <!--  end row -->
        </div>
      </div>
    </section><!-- End Contact Section -->
@endsection
@push('js')
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('public/src/jquery.exzoom.js') }}"></script>
  <!-- ----------------------- -->
  <script type="text/javascript">
    $('.hel').imagesLoaded( function() {
    $("#exzoom").exzoom({
          autoPlay: false,
      });
    $("#exzoom").removeClass('hidden')
  });
  </script>
@endpush

`

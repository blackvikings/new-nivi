@extends('layouts.app')
@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url({{ asset('public/assets/img/slide/slide-1.jpg') }});">
                    <div class="carousel-container">
                        <div class="carousel-content animate__animated animate__fadeInUp">
                            <h2>Welcome to <span>Company</span></h2>
                            <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                            <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item" style="background-image: url({{ asset('public/assets/img/slide/slide-2.jpg') }});">
                    <div class="carousel-container">
                        <div class="carousel-content animate__animated animate__fadeInUp">
                            <h2>Lorem Ipsum Dolor</h2>
                            <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                            <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item" style="background-image: url({{ asset('public/assets/img/slide/slide-3.jpg') }});">
                    <div class="carousel-container">
                        <div class="carousel-content animate__animated animate__fadeInUp">
                            <h2>Sequi ea ut et est quaerat</h2>
                            <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
                            <div class="text-center"><a href="" class="btn-get-started">Read More</a></div>
                        </div>
                    </div>
                </div>

            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Us Section ======= -->
        <section id="about-us" class="about-us">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>About Us</strong></h2>
                </div>

                <div class="row content">
                    <div class="col-lg-12 pt-4 pt-lg-0" data-aos="fade-left">
                        <p>
                            <span style="color: #1bbd36">NIVI HEALTHE CARE PVT. LTD.</span> aims to reach the maximum number of people across the society and make them aware of their inner potential through an innovative range of wellness products at an affordable price. NHCPL direct selling company established in 2020 with its head office in KORBA-CHHATTISHGARDH offering a wide range of Health, Wellness and Personal Care products for the consumer. In addition, NIVI is committed to provide ongoing innovative training solutions to empower individuals to unleash their inner hidden potential to build a solid career with them.<br><br>

                            NHCPL believes in the ideology that one needs to compete with one's own self rather than with others. It shall always strive to follow the powerful business idea of "Giving as a source of Receiving," which illuminates the principles of Contribution, Abundance, Service and Success. It is a lovely reminder to us that the world is abundant and rewards those who act with generosity of spirit. By getting associated with NIVI, each member would embark on a definite path towards a better life. We welcome you to take a prompt decision to design your future.
                        </p>
                    </div>
                    <!-- <div class="col-lg-6" data-aos="fade-right">
                      <img src="./assets/ourImages/depositphotos_48701865-stock-photo-about-us.jpg" class="img-fluid" alt="..." height="300px">
                    </div> -->
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- Management Desk -->
        <section id="about-us" class="about-us">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2><strong> MANAGEMENT DESK </strong></h2>
                </div>

                <div class="row content">
                    <div class="col-lg-6" data-aos="fade-right">
                        <img src="{{ asset('public/assets/ourImages/about.jpg') }}" class="img-fluid" alt="..." height="300px">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
                        <ul>
                            <li><i class="ri-check-double-line"></i> We as a company were in search of unique products, which could address to the problems a common man faces in his day to day life. Products, which will make a man not only healthy but wealthy as well. Life is full of uncertainties and simply unpredictable. Especially, the environment which we are living -in, is absolute hazardous. The effects of polluted and hazardous environment is such, that we witness in our day to day life, everybody having one or the other problems; physically or mentally. The reasons are not far to seek.</li><br>
                            <li><i class="ri-check-double-line"></i> We introduced unique Products free from chemical and pesticides. Today, we are specially known for our products, which are not only qualities based but result oriented too.
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>
        <!-- End management desk -->

        <!-- ======= Services Section ======= -->
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



    </main><!-- End #main -->

@endsection

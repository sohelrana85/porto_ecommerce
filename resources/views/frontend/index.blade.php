@extends('frontend.components.layout')

@section('title')
    Home
@endsection

@section('content')

    <div class="container mb-2">

        {{ Breadcrumbs::render('home') }}
        <div class="row">
            <div class="col-lg-9">
                <div id="search-content">
                    <div class="home-slider owl-carousel owl-theme owl-carousel-lazy mb-2" data-owl-options="
                                                                                                    {'loop': true,'dots': true, 'nav': false, 'autoplay': true }
                                                                                                    ">
                        <div class="home-slide home-slide1 banner banner-md-vw banner-sm-vw">
                            <img class="owl-lazy slide-bg" src="{{ asset('frontend/assets/images/lazy.png') }}"
                                data-src="{{ asset('frontend/assets/images/slider/slide-1.png') }}" alt="slider image">
                            <div class="banner-layer banner-layer-middle">
                                <h4 class="text-white pb-4 mb-0">Find the Boundaries. Push Through!</h4>
                                <h2 class="text-white mb-0">Summer Sale</h2>
                                <h3 class="text-white text-uppercase m-b-3">70% Off</h3>
                                <h5 class="text-white text-uppercase d-inline-block mb-0 ls-n-20 align-text-bottom">Starting
                                    At
                                    <b class="coupon-sale-text bg-secondary text-white d-inline-block">$<em
                                            class="align-text-top">199</em>99</b>
                                </h5>
                                <a href="category.html" class="btn btn-dark btn-md ls-10">Shop Now!</a>
                            </div><!-- End .banner-layer -->
                        </div><!-- End .home-slide -->

                        <div class="home-slide home-slide2 banner banner-md-vw banner-sm-vw">
                            <img class="owl-lazy slide-bg" src="{{ asset('frontend/assets/images/lazy.png') }}"
                                data-src="{{ asset('frontend/assets/images/slider/slide-2.png') }}" alt="slider image">
                            <div class="banner-layer banner-layer-middle text-uppercase">
                                <h4 class="m-b-2">Over 200 products with discounts</h4>
                                <h2 class="m-b-3">Great Deals</h2>
                                <h5 class="d-inline-block mb-0 align-top mr-5">Starting At <b>$<em>299</em>99</b></h5>
                                <a href="category.html" class="btn btn-dark btn-md ls-10">Get Yours!</a>
                            </div><!-- End .banner-layer -->
                        </div><!-- End .home-slide -->

                        <div class="home-slide home-slide3 banner banner-md-vw banner-sm-vw">
                            <img class="owl-lazy slide-bg"
                                data-src="{{ asset('frontend/assets/images/slider/slide-3.png') }}">
                            <div class="banner-layer banner-layer-middle text-uppercase">
                                <h4 class="m-b-2">Up to 70% off</h4>
                                <h2 class="m-b-3">New Arrivals</h2>
                                <h5 class="d-inline-block mb-0 align-top mr-5">Starting At <b>$<em>299</em>99</b></h5>
                                <a href="category.html" class="btn btn-dark btn-md ls-10">Get Yours!</a>
                            </div><!-- End .banner-layer -->
                        </div><!-- End .home-slide -->
                    </div><!-- End .home-slider -->

                    <div class="banners-container m-b-2 owl-carousel owl-theme"
                        data-owl-options="{
                                                                                                                                'dots': false,
                                                                                                                                'margin': 20,
                                                                                                                                'loop': false,
                                                                                                                                'responsive': {
                                                                                                                                    '480': {
                                                                                                                                        'items': 2
                                                                                                                                    },
                                                                                                                                    '768': {
                                                                                                                                        'items': 3
                                                                                                                                    }
                                                                                                                                }
                                                                                                                            }">
                        <div class="banner banner1 banner-hover-shadow mb-2">
                            <figure>
                                <img src="{{ asset('frontend/assets/images/banners/banner-1.jpg') }}" alt="banner">
                            </figure>
                            <div class="banner-layer banner-layer-middle">
                                <h3 class="m-b-2">Porto Watches</h3>
                                <h4 class="m-b-4 text-primary"><sup class="text-dark"><del>20%</del></sup>30%<sup>OFF</sup>
                                </h4>
                                <a href="#" class="text-dark text-uppercase ls-10">Shop Now</a>
                            </div>
                        </div><!-- End .banner -->
                        <div class="banner banner2 text-uppercase banner-hover-shadow mb-2">
                            <figure>
                                <img src="{{ asset('frontend/assets/images/banners/banner-2.jpg') }}" alt="banner">
                            </figure>
                            <div class="banner-layer banner-layer-middle text-center pt-2">
                                <h3 class="m-b-1 ls-n-20">Deal Promos</h3>
                                <h4 class="m-b-4 text-body">Starting at $99</h4>
                                <a href="#" class="text-dark text-uppercase ls-10">Shop Now</a>
                            </div>
                        </div><!-- End .banner -->
                        <div class="banner banner3 banner-hover-shadow mb-2">
                            <figure>
                                <img src="{{ asset('frontend/assets/images/banners/banner-3.jpg') }}" alt="banner">
                            </figure>
                            <div class="banner-layer banner-layer-middle text-right">
                                <h3 class="m-b-2">Handbags</h3>
                                <h4 class="mb-3 pb-1 text-secondary text-uppercase">Starting at $99</h4>
                                <a href="#" class="text-dark text-uppercase ls-10">Shop Now</a>
                            </div>
                        </div><!-- End .banner -->
                    </div>


                    <!-- FEATURED PRODUCT SECTION -->
                    <h2 class="section-title ls-n-10 m-b-4">Featured Products</h2>
                    <div class="products-slider owl-carousel owl-theme dots-top m-b-1 pb-1">
                        @foreach ($featured as $featureproduct)
                            <div class="product-default inner-quickview inner-icon">
                                <figure class="mb-0">
                                    <a href="{{ route('product', $featureproduct->slug) }}">
                                        <img src="{{ asset('product_photo/' . $featureproduct->thumbnail) }}">
                                    </a>

                                    @if ($featureproduct->special_price != '' && $featureproduct->special_price != 0)
                                        @if ($featureproduct->special_price_from <= date('Y-m-d') && date('Y-m-d') <= $featureproduct->special_price_to)
                                            <div class="label-group">
                                                <div class="product-label label-sale">
                                                    -{{ round((($featureproduct->selling_price - $featureproduct->special_price) / $featureproduct->selling_price) * 100, 2) }}
                                                    %</div>
                                            </div>
                                        @endif
                                    @endif
                                </figure>
                                <div class="product-details">
                                    <h2 class="product-title" style="height: 35px; line-height:1.1">
                                        <a href="{{ route('product', $featureproduct->slug) }}"
                                            style="font-size: 13px;white-space: normal;">
                                            {{ $featureproduct->name }}
                                        </a>
                                    </h2>
                                    <div class="price-box">
                                        @if ($featureproduct->special_price != '' && $featureproduct->special_price != 0)
                                            @if ($featureproduct->special_price_from <= date('Y-m-d') && date('Y-m-d') <= $featureproduct->special_price_to)
                                                <span style="font-size: 13px;" class="old-price">&#2547;
                                                    {{ $featureproduct->selling_price }}</span>
                                                <span style="font-size: 13px;" class="product-price">&#2547;
                                                    {{ $featureproduct->special_price }}</span>
                                            @else
                                                <span style="font-size: 13px;" class="">&#2547;
                                                    {{ $featureproduct->selling_price }}</span>
                                            @endif
                                        @else
                                            <span style="font-size: 13px;" class="">&#2547;
                                                {{ $featureproduct->selling_price }}</span>
                                        @endif
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>

                        @endforeach
                    </div><!-- End .featured-proucts -->



                    <!-- Best-Selling-proucts -->
                    <h2 class="section-title ls-n-10 m-b-4">Best Selling Products</h2>
                    <div class="products-slider owl-carousel owl-theme dots-top m-b-1 pb-1">
                        @foreach ($featured as $featureproduct)
                            <div class="product-default inner-quickview inner-icon">
                                <figure class="mb-0">
                                    <a href="{{ route('product', $featureproduct->slug) }}">
                                        <img src="{{ asset('product_photo/' . $featureproduct->thumbnail) }}">
                                    </a>

                                    @if ($featureproduct->special_price != '' && $featureproduct->special_price != 0)
                                        @if ($featureproduct->special_price_from <= date('Y-m-d') && date('Y-m-d') <= $featureproduct->special_price_to)
                                            <div class="label-group">
                                                <div class="product-label label-sale">
                                                    -{{ round((($featureproduct->selling_price - $featureproduct->special_price) / $featureproduct->selling_price) * 100, 2) }}
                                                    %</div>
                                            </div>
                                        @endif
                                    @endif
                                </figure>
                                <div class="product-details">
                                    <h2 class="product-title" style="height: 35px; line-height:1.1">
                                        <a href="{{ route('product', $featureproduct->slug) }}"
                                            style="font-size: 13px;white-space: normal;">
                                            {{ $featureproduct->name }}
                                        </a>
                                    </h2>
                                    <div class="price-box">
                                        @if ($featureproduct->special_price != '' && $featureproduct->special_price != 0)
                                            @if ($featureproduct->special_price_from <= date('Y-m-d') && date('Y-m-d') <= $featureproduct->special_price_to)
                                                <span style="font-size: 13px;" class="old-price">&#2547;
                                                    {{ $featureproduct->selling_price }}</span>
                                                <span style="font-size: 13px;" class="product-price">&#2547;
                                                    {{ $featureproduct->special_price }}</span>
                                            @else
                                                <span style="font-size: 13px;" class="">&#2547;
                                                    {{ $featureproduct->selling_price }}</span>
                                            @endif
                                        @else
                                            <span style="font-size: 13px;" class="">&#2547;
                                                {{ $featureproduct->selling_price }}</span>
                                        @endif
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>

                        @endforeach
                    </div><!-- End Best-Selling-proucts -->

                    <!-- Latest-proucts -->
                    <h2 class="section-title ls-n-10 m-b-4">Latest Products</h2>
                    <div class="products-slider owl-carousel owl-theme dots-top m-b-1 pb-1">
                        @foreach ($featured as $featureproduct)
                            <div class="product-default inner-quickview inner-icon">
                                <figure class="mb-0">
                                    <a href="{{ route('product', $featureproduct->slug) }}">
                                        <img src="{{ asset('product_photo/' . $featureproduct->thumbnail) }}">
                                    </a>

                                    @if ($featureproduct->special_price != '' && $featureproduct->special_price != 0)
                                        @if ($featureproduct->special_price_from <= date('Y-m-d') && date('Y-m-d') <= $featureproduct->special_price_to)
                                            <div class="label-group">
                                                <div class="product-label label-sale">
                                                    -{{ round((($featureproduct->selling_price - $featureproduct->special_price) / $featureproduct->selling_price) * 100, 2) }}
                                                    %</div>
                                            </div>
                                        @endif
                                    @endif
                                </figure>
                                <div class="product-details">
                                    <h2 class="product-title" style="height: 35px; line-height:1.1">
                                        <a href="{{ route('product', $featureproduct->slug) }}"
                                            style="font-size: 13px;white-space: normal;">
                                            {{ $featureproduct->name }}
                                        </a>
                                    </h2>
                                    <div class="price-box">
                                        @if ($featureproduct->special_price != '' && $featureproduct->special_price != 0)
                                            @if ($featureproduct->special_price_from <= date('Y-m-d') && date('Y-m-d') <= $featureproduct->special_price_to)
                                                <span style="font-size: 13px;" class="old-price">&#2547;
                                                    {{ $featureproduct->selling_price }}</span>
                                                <span style="font-size: 13px;" class="product-price">&#2547;
                                                    {{ $featureproduct->special_price }}</span>
                                            @else
                                                <span style="font-size: 13px;" class="">&#2547;
                                                    {{ $featureproduct->selling_price }}</span>
                                            @endif
                                        @else
                                            <span style="font-size: 13px;" class="">&#2547;
                                                {{ $featureproduct->selling_price }}</span>
                                        @endif
                                    </div><!-- End .price-box -->
                                </div><!-- End .product-details -->
                            </div>

                        @endforeach
                    </div><!-- End .Latest-proucts -->
                </div>




                <hr class="mt-1 mb-4">

                <div class="feature-boxes-container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="feature-box px-sm-3 feature-box-simple text-center">
                                <i class="icon-earphones-alt"></i>

                                <div class="feature-box-content">
                                    <h3 class="m-b-1">Customer Support</h3>
                                    <h5 class="m-b-3">Need Assistance?</h5>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna,
                                        et dapib.</p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-md-4 -->

                        <div class="col-md-4">
                            <div class="feature-box px-sm-3 feature-box-simple text-center">
                                <i class="icon-credit-card"></i>

                                <div class="feature-box-content">
                                    <h3 class="m-b-1">Secured Payment</h3>
                                    <h5 class="m-b-3">Safe & Fast</h5>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna,
                                        et dapib.</p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-md-4 -->

                        <div class="col-md-4">
                            <div class="feature-box px-sm-3 feature-box-simple text-center">
                                <i class="icon-action-undo"></i>

                                <div class="feature-box-content">
                                    <h3 class="m-b-1">Returns</h3>
                                    <h5 class="m-b-3">Easy & Free</h5>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna,
                                        et dapib.</p>
                                </div><!-- End .feature-box-content -->
                            </div><!-- End .feature-box -->
                        </div><!-- End .col-md-4 -->
                    </div><!-- End .row -->
                </div><!-- End .feature-boxes-container -->
            </div><!-- End .col-lg-9 -->

            <div class="sidebar-overlay"></div>
            <div class="sidebar-toggle"><i class="fas fa-sliders-h"></i></div>
            <aside class="sidebar-home col-lg-3 order-lg-first mobile-sidebar">
                <div class="side-menu-wrapper text-uppercase mb-2 d-none d-lg-block">
                    <h2 class="side-menu-title bg-gray ls-n-25">Browse Categories</h2>

                    <nav class="side-nav">
                        {!! frontendCategories($menucategories) !!}
                    </nav>
                </div><!-- End .side-menu-container -->

                <div class="widget widget-banners px-5 pb-3 text-center">
                    <div class="owl-carousel owl-theme">
                        <div class="banner d-flex flex-column align-items-center">
                            <h3
                                class="badge-sale bg-primary d-flex flex-column align-items-center justify-content-center text-uppercase">
                                <em class="pt-3 ls-0">Sale</em>Many Item
                            </h3>
                            <h4 class="sale-text font1 text-uppercase m-b-3">45<sup>%</sup><sub>off</sub></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a href="#" class="btn btn-dark btn-md font1">View Sale</a>
                        </div><!-- End .banner -->

                        <div class="banner d-flex flex-column align-items-center">
                            <h3
                                class="badge-sale bg-primary d-flex flex-column align-items-center justify-content-center text-uppercase">
                                <em class="pt-3 ls-0">Sale</em>Many Item
                            </h3>
                            <h4 class="sale-text font1 text-uppercase m-b-3">45<sup>%</sup><sub>off</sub></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a href="#" class="btn btn-dark btn-md font1">View Sale</a>
                        </div><!-- End .banner -->

                        <div class="banner d-flex flex-column align-items-center">
                            <h3
                                class="badge-sale bg-primary d-flex flex-column align-items-center justify-content-center text-uppercase">
                                <em class="pt-3 ls-0">Sale</em>Many Item
                            </h3>
                            <h4 class="sale-text font1 text-uppercase m-b-3">45<sup>%</sup><sub>off</sub></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            <a href="#" class="btn btn-dark btn-md font1">View Sale</a>
                        </div><!-- End .banner -->
                    </div><!-- End .banner-slider -->
                </div><!-- End .widget -->

                <div class="widget widget-testimonials">
                    <div class="owl-carousel owl-theme dots-left">
                        <div class="testimonial">
                            <div class="testimonial-owner">
                                <figure>
                                    <img src="{{ asset('frontend/assets/images/clients/client-1.jpg') }}" alt="client">
                                </figure>

                                <div>
                                    <h4 class="testimonial-title">john Smith</h4>
                                    <span>CEO &amp; Founder</span>
                                </div>
                            </div><!-- End .testimonial-owner -->

                            <blockquote class="ml-4 pr-0">
                                <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi.</p>
                            </blockquote>
                        </div><!-- End .testimonial -->

                        <div class="testimonial">
                            <div class="testimonial-owner">
                                <figure>
                                    <img src="{{ asset('frontend/assets/images/clients/client-2.jpg') }}" alt="client">
                                </figure>

                                <div>
                                    <h4 class="testimonial-title">Dae Smith</h4>
                                    <span>CEO &amp; Founder</span>
                                </div>
                            </div><!-- End .testimonial-owner -->

                            <blockquote class="ml-4 pr-0">
                                <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi.</p>
                            </blockquote>
                        </div><!-- End .testimonial -->

                        <div class="testimonial">
                            <div class="testimonial-owner">
                                <figure>
                                    <img src="{{ asset('frontend/assets/images/clients/client-3.jpg') }}" alt="client">
                                </figure>

                                <div>
                                    <h4 class="testimonial-title">John Doe</h4>
                                    <span>CEO &amp; Founder</span>
                                </div>
                            </div><!-- End .testimonial-owner -->

                            <blockquote class="ml-4 pr-0">
                                <p>Lorem ipsum dolor sit amet, consectetur elitad adipiscing Cras non placerat mi.</p>
                            </blockquote>
                        </div><!-- End .testimonial -->
                    </div><!-- End .testimonials-slider -->
                </div><!-- End .widget -->

                <div class="widget widget-posts post-date-in-media">
                    <div class="owl-carousel owl-theme dots-left dots-m-0"
                        data-owl-options="{
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    'margin': 20
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                }">
                        <article class="post">
                            <div class="post-media">
                                <a href="single.html">
                                    <img src="{{ asset('frontend/assets/images/blog/home/post-1.jpg') }}" alt="Post">
                                </a>
                                <div class="post-date">
                                    <span class="day">29</span>
                                    <span class="month">Jun</span>
                                </div><!-- End .post-date -->
                            </div><!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title m-b-2">
                                    <a href="single.html">Fashion Trends</a>
                                </h2>

                                <div class="post-content">
                                    <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora
                                        torquent per conubia nostra, per incep tos himens.</p>

                                    <a href="single.html" class="read-more">read more <i class="icon-right-open"></i></a>
                                </div><!-- End .post-content -->
                            </div><!-- End .post-body -->
                        </article>

                        <article class="post">
                            <div class="post-media">
                                <a href="single.html">
                                    <img src="{{ asset('frontend/assets/images/blog/home/post-2.jpg') }}" alt="Post">
                                </a>
                                <div class="post-date">
                                    <span class="day">29</span>
                                    <span class="month">Jun</span>
                                </div><!-- End .post-date -->
                            </div><!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title m-b-2">
                                    <a href="single.html">Fashion Trends</a>
                                </h2>

                                <div class="post-content">
                                    <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora
                                        torquent per conubia nostra, per incep tos himens.</p>

                                    <a href="single.html" class="read-more">read more <i class="icon-right-open"></i></a>
                                </div><!-- End .post-content -->
                            </div><!-- End .post-body -->
                        </article>

                        <article class="post">
                            <div class="post-media">
                                <a href="single.html">
                                    <img src="{{ asset('frontend/assets/images/blog/home/post-3.jpg') }}" alt="Post">
                                </a>
                                <div class="post-date">
                                    <span class="day">29</span>
                                    <span class="month">Jun</span>
                                </div><!-- End .post-date -->
                            </div><!-- End .post-media -->

                            <div class="post-body">
                                <h2 class="post-title m-b-2">
                                    <a href="single.html">Fashion Trends</a>
                                </h2>

                                <div class="post-content">
                                    <p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora
                                        torquent per conubia nostra, per incep tos himens.</p>

                                    <a href="single.html" class="read-more">read more <i class="icon-right-open"></i></a>
                                </div><!-- End .post-content -->
                            </div><!-- End .post-body -->
                        </article>
                    </div><!-- End .posts-slider -->
                </div><!-- End .widget -->
            </aside><!-- End .col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->


@endsection

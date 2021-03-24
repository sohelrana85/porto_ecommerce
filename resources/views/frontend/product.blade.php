@extends('frontend.components.layout')

@section('title')
    Product
@endsection

@section('content')

<main class="main">
    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Shoes</a></li>
            </ol>
        </nav>
        <div class="product-single-container product-single-default">
            <div class="row">
                <div class="col-md-5 product-single-gallery">
                    <div class="product-slider-container">
                        <div class="product-single-carousel owl-carousel owl-theme">
                            @foreach ($images as $item)
                            <div class="product-item" >
                                <img class="product-single-image" src="{{ asset('product_photo/'.$item) }}" data-zoom-image="{{ asset('product_photo/'.$product->thumbnail) }}"/>
                            </div>
                            @endforeach

                        </div>
                        <!-- End .product-single-carousel -->
                        <span class="prod-full-screen">
                            <i class="icon-plus"></i>
                        </span>
                    </div>
                    <div class="prod-thumbnail owl-dots" id='carousel-custom-dots'>
                        @foreach ($images as $item)
                        <div class="owl-dot">
                            <img src="{{ asset('product_photo/'.$item) }}" style="max-width: 120px" />
                        </div>
                        @endforeach
                    </div>
                </div><!-- End .product-single-gallery -->

                <div class="col-md-7 product-single-details">
                    <h1 class="product-title">{{ $product->name }}</h1>

                    <div class="ratings-container">
                        <div class="product-ratings">
                            <span class="ratings" style="width:60%"></span><!-- End .ratings -->
                        </div><!-- End .product-ratings -->

                        <a href="#" class="rating-link">( 6 Reviews )</a>
                    </div><!-- End .ratings-container -->

                    <hr class="short-divider">

                    <div class="price-box">
                        @if($product->special_price_from != "")
                            @if ($product->special_price_from <= date('Y-m-d') && date('Y-m-d') <= $product->special_price_to)
                            <span class = "old-price">BDT {{ $product->selling_price }}</span>
                            <span class = "product-price">BDT {{ $product->special_price }}</span>
                            @else
                            <span class = "">BDT {{ $product->selling_price }}</span>
                            @endif
                        @endif
                    </div><!-- End .price-box -->

                    {{-- <div class="product-desc">
                        <p>
                            {!! $product->description !!}
                        </p>
                    </div><!-- End .product-desc --> --}}

                    <div class="product-filters-container">
                        <div class="product-single-filter mb-2">
                            <label>Sizes:</label>
                            <ul class="config-size-list">
                                @foreach (json_decode($product->size) as $key => $value)
                                <li class="size-item" data-value="{{$value}}"><a href="javascript:">{{ $value }}</a></li>
                                @endforeach
                            </ul>
                        </div><!-- End .product-single-filter -->
                    </div><!-- End .product-filters-container -->
                    <div class="product-filters-container">
                        <div class="product-single-filter mb-2">
                            <label>Color:</label>
                            <ul class="config-size-list">
                                @foreach (json_decode($product->color) as $key => $value)
                                <li class="color-item" data-value="{{$value}}"><a href="javascript:" style="background-color: #{{ colorCode($value) }}"></a></li>
                                @endforeach

                            </ul>
                        </div><!-- End .product-single-filter -->
                    </div><!-- End .product-filters-container -->

                    <hr class="divider">

                    <div class="product-action">
                        <div class="product-single-qty">
                            <input class="horizontal-quantity form-control" type="text">
                        </div><!-- End .product-single-qty -->

                        <a href="cart.html" class="btn btn-dark add-cart icon-shopping-cart" title="Add to Cart">Add to Cart</a>
                    </div><!-- End .product-action -->

                    <hr class="divider mb-1">

                    <div class="product-single-share">
                        <label class="sr-only">Share:</label>

                        <div class="social-icons mr-2">
                            <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                            <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                            <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank" title="Linkedin"></a>
                            <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank" title="Google +"></a>
                            <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank" title="Mail"></a>
                        </div><!-- End .social-icons -->

                        <a href="#" class="add-wishlist" title="Add to Wishlist">Add to Wishlist</a>
                    </div><!-- End .product single-share -->
                </div><!-- End .product-single-details -->
            </div><!-- End .row -->
        </div><!-- End .product-single-container -->

        <div class="product-single-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="product-tab-more-info" data-toggle="tab" href="#product-more-info-content" role="tab" aria-controls="product-more-info-content" aria-selected="false">More Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews (3)</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                    <div class="product-desc-content">
                        {!! $product->description !!}
                    </div><!-- End .product-desc-content -->
                </div><!-- End .tab-pane -->

                <div class="tab-pane fade fade" id="product-more-info-content" role="tabpanel" aria-labelledby="product-tab-more-info">
                    <div class="product-desc-content">
                        <p>{!! $product->description !!}</p>
                    </div><!-- End .product-desc-content -->
                </div><!-- End .tab-pane -->



                <div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
                    <div class="product-reviews-content">
                        <div class="row">
                            <div class="col-xl-7">
                                <h2 class="reviews-title">3 reviews for Product Long Name</h2>

                                <ol class="comment-list">
                                    <li class="comment-container">
                                        <div class="comment-avatar">
                                            <img src="assets/images/avatar/avatar1.jpg" width="65" height="65" alt="avatar"/>
                                        </div><!-- End .comment-avatar-->

                                        <div class="comment-box">
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .ratings-container -->

                                            <div class="comment-info mb-1">
                                                <h4 class="avatar-name">John Doe</h4> - <span class="comment-date">Novemeber 15, 2019</span>
                                            </div><!-- End .comment-info -->

                                            <div class="comment-text">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                            </div><!-- End .comment-text -->
                                        </div><!-- End .comment-box -->
                                    </li><!-- comment-container -->

                                    <li class="comment-container">
                                        <div class="comment-avatar">
                                            <img src="assets/images/avatar/avatar2.jpg" width="65" height="65" alt="avatar"/>
                                        </div><!-- End .comment-avatar-->

                                        <div class="comment-box">
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .ratings-container -->

                                            <div class="comment-info mb-1">
                                                <h4 class="avatar-name">John Doe</h4> - <span class="comment-date">Novemeber 15, 2019</span>
                                            </div><!-- End .comment-info -->

                                            <div class="comment-text">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                            </div><!-- End .comment-text -->
                                        </div><!-- End .comment-box -->
                                    </li><!-- comment-container -->

                                    <li class="comment-container">
                                        <div class="comment-avatar">
                                            <img src="assets/images/avatar/avatar3.jpg" width="65" height="65" alt="avatar"/>
                                        </div><!-- End .comment-avatar-->

                                        <div class="comment-box">
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                                </div><!-- End .product-ratings -->
                                            </div><!-- End .ratings-container -->

                                            <div class="comment-info mb-1">
                                                <h4 class="avatar-name">John Doe</h4> - <span class="comment-date">Novemeber 15, 2019</span>
                                            </div><!-- End .comment-info -->

                                            <div class="comment-text">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                                            </div><!-- End .comment-text -->
                                        </div><!-- End .comment-box -->
                                    </li><!-- comment-container -->
                                </ol><!-- End .comment-list -->
                            </div>

                            <div class="col-xl-5">
                                <div class="add-product-review">
                                    <form action="#" class="comment-form m-0">
                                        <h3 class="review-title">Add a Review</h3>

                                        <div class="rating-form">
                                            <label for="rating">Your rating</label>
                                            <span class="rating-stars">
                                                <a class="star-1" href="#">1</a>
                                                <a class="star-2" href="#">2</a>
                                                <a class="star-3" href="#">3</a>
                                                <a class="star-4" href="#">4</a>
                                                <a class="star-5" href="#">5</a>
                                            </span>

                                            <select name="rating" id="rating" required="" style="display: none;">
                                                <option value="">Rate…</option>
                                                <option value="5">Perfect</option>
                                                <option value="4">Good</option>
                                                <option value="3">Average</option>
                                                <option value="2">Not that bad</option>
                                                <option value="1">Very poor</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Your Review</label>
                                            <textarea cols="5" rows="6" class="form-control form-control-sm"></textarea>
                                        </div><!-- End .form-group -->


                                        <div class="row">
                                            <div class="col-md-6 col-xl-12">
                                                <div class="form-group">
                                                    <label>Your Name</label>
                                                    <input type="text" class="form-control form-control-sm" required>
                                                </div><!-- End .form-group -->
                                            </div>

                                            <div class="col-md-6 col-xl-12">
                                                <div class="form-group">
                                                    <label>Your E-mail</label>
                                                    <input type="text" class="form-control form-control-sm" required>
                                                </div><!-- End .form-group -->
                                            </div>
                                        </div>

                                        <input type="submit" class="btn btn-dark ls-n-15" value="Submit">
                                    </form>
                                </div><!-- End .add-product-review -->
                            </div>
                        </div>
                    </div><!-- End .product-reviews-content -->
                </div><!-- End .tab-pane -->
            </div><!-- End .tab-content -->
        </div><!-- End .product-single-tabs -->

        <div class="products-section pt-0">
            <h2 class="section-title">Related Products</h2>

            <div class="products-slider owl-carousel owl-theme dots-top">
                @foreach ($relproducts as $products)

                <div class="product-default inner-quickview inner-icon">
                    <figure>
                        <a href="{{ route('product', $products->slug) }}">
                            <img src="{{ asset('product_photo/'.$products->thumbnail) }}">
                        </a>
                        <div class="label-group">
                            @if($products->special_price_from != "")
                                @if ($products->special_price_from <= date('Y-m-d') && date('Y-m-d') <= $products->special_price_to)
                                    <div class = "product-label label-sale">{{ number_format((float)((($products->selling_price - $products->special_price)/$products->selling_price)*100), 2) }}</div>
                                @endif
                            @endif
                        </div>
                        <div class="btn-icon-group">
                            <button class="btn-icon btn-add-cart" data-toggle="modal" data-target="#addCartModal"><i class="icon-shopping-cart"></i></button>
                        </div>
                        <a href="{{ route('product.quickview', $products->slug) }}" class="btn-quickview" title="Quick View">Quick View</a>
                    </figure>
                    <div class="product-details">
                        <h3 class="product-title">
                            <a href="{{ route('product', $products->slug) }}">{{ $products->name }}</a>
                        </h3>
                        <div class="ratings-container">
                            <div class="product-ratings">
                                <span class="ratings" style="width:100%"></span><!-- End .ratings -->
                                <span class="tooltiptext tooltip-top"></span>
                            </div><!-- End .product-ratings -->
                        </div><!-- End .ratings-container -->
                        <div class="price-box">
                            @if($products->special_price_from != "")
                                @if ($products->special_price_from <= date('Y-m-d') && date('Y-m-d') <= $products->special_price_to)
                                <span class="old-price">BDT {{ $products->selling_price }}</span>
                                <span class="product-price">BDT {{ $products->special_price }}</span>
                                @else
                                <span class="">BDT {{ $products->selling_price }}</span>
                                @endif
                            @endif
                        </div><!-- End .price-box -->
                    </div><!-- End .product-details -->
                </div>
                @endforeach

            </div><!-- End .products-slider -->
        </div><!-- End .products-section -->
    </div><!-- End .container -->
</main><!-- End .main -->
@endsection

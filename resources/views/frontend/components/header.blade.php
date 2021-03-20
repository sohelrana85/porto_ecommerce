<header class="header">

    <div class="header-top bg-primary text-uppercase">
        <div class="container">
            <div class="header-left">
                <div class="header-dropdown">
                    <a href="#" class="pl-0"><img src="assets/images/flags/en.png" alt="England flag">ENG</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#"><img src="assets/images/flags/en.png" alt="England flag">ENG</a></li>
                            <li><a href="#"><img src="assets/images/flags/fr.png" alt="France flag">FRA</a></li>
                        </ul>
                    </div><!-- End .header-menu -->
                </div><!-- End .header-dropown -->

                <div class="header-dropdown ml-4">
                    <a href="#">USD</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">EUR</a></li>
                            <li><a href="#">USD</a></li>
                        </ul>
                    </div><!-- End .header-menu -->
                </div><!-- End .header-dropown -->
            </div><!-- End .header-left -->

            <div class="header-right header-dropdowns ml-0 ml-sm-auto">
                <p class="top-message mb-0 mr-lg-5 pr-3 d-none d-sm-block">Welcome To Porto!</p>
                <div class="header-dropdown dropdown-expanded mr-3">
                    <a href="#">Links</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="my-account.html">Track Order </a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="category.html">Our Stores</a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="#">Help &amp; FAQs</a></li>
                        </ul>
                    </div><!-- End .header-menu -->
                </div><!-- End .header-dropown -->

                <span class="separator"></span>

                <div class="social-icons">
                    <a href="#" class="social-icon social-instagram icon-instagram" target="_blank"></a>
                    <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"></a>
                    <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"></a>
                </div><!-- End .social-icons -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-top -->


    <div class="header-middle text-dark sticky-header" style="padding: 1.5rem 0;">
        <div class="container">
            <div class="header-left col-lg-2 w-auto pl-0">
                <button class="mobile-menu-toggler mr-2" type="button">
                    <i class="icon-menu"></i>
                </button>
                <a href="{{ route('index') }}" class="logo">
                    <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="Porto Logo">
                </a>
            </div><!-- End .header-left -->

            <div class="header-right w-lg-max pl-2">
                <div class="header-search header-icon header-search-inline header-search-category w-lg-max mr-lg-4">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper">
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search..." required>
                            <div class="select-custom">
                                <select id="cat" name="cat">
                                    <option value="">All Categories</option>
                                    {{-- {!! searchCategories($categories) !!} --}}
                                </select>
                            </div><!-- End .select-custom -->
                            <button class="btn p-0 icon-search-3" type="submit"></button>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->

                <div class="header-contact d-none d-lg-flex align-items-center pr-xl-5 mr-3 ml-xl-5">
                    <i class="icon-phone-2"></i>
                    <h6 class="pt-1 line-height-1">Call us now<a href="javascript:" class="d-block text-dark ls-10 pt-1">+880 1721 850 242</a></h6>
                </div><!-- End .header-contact -->

                <a href="login.html" class="header-icon login-link"><i class="icon-user-2"></i></a>

                <a href="#" class="header-icon"><i class="icon-wishlist-2"></i></a>

                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle dropdown-arrow" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-count badge-circle">{{count($cart_items)}}</span>
                    </a>

                    <div class="dropdown-menu">
                        <div class="dropdownmenu-wrapper">
                            <div class="dropdown-cart-header">
                                <span>{{count($cart_items)}} Items</span>

                                <a href="{{route('cart.show')}}" class="float-right">View Cart</a>
                            </div><!-- End .dropdown-cart-header -->

                            <div class="dropdown-cart-products">

                                @foreach ($cart_items as $cartitem)
                                <div class="product">
                                    <div class="product-details">
                                        <h4 class="product-title">
                                            <a href="{{ route('product', $cartitem->attributes->slug) }}">{{$cartitem->name}}</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">1</span>
                                            x {{$cartitem->price}}
                                        </span>
                                    </div><!-- End .product-details -->

                                    <figure class="product-image-container">
                                        <a href="{{ route('product', $cartitem->attributes->slug) }}" class="product-image">
                                            <img src="{{ asset('product_photo/'. $cartitem->attributes->thumbnail) }}" alt="product" style="height: 60px; object-fit: cover">
                                        </a>
                                        <a href="{{ route('cart.remove', $cartitem->id) }}" class="btn-remove icon-cancel" title="Remove Product"></a>
                                    </figure>
                                </div><!-- End .product -->
                                @endforeach
                                {{--
                                <div class="product">
                                    <div class="product-details">
                                        <h4 class="product-title">
                                            <a href="product.html">Woman Necklace</a>
                                        </h4>

                                        <span class="cart-product-info">
                                            <span class="cart-product-qty">1</span>
                                            x $35.00
                                        </span>
                                    </div><!-- End .product-details -->

                                    <figure class="product-image-container">
                                        <a href="product.html" class="product-image">
                                            <img src="{{ asset('frontend/assets/images/products/cart/product-2.jpg') }}" alt="product" width="80" height="80">
                                        </a>
                                        <a href="#" class="btn-remove icon-cancel" title="Remove Product"></a>
                                    </figure>
                                </div><!-- End .product -->
                            </div><!-- End .cart-product --> --}}

                            <div class="dropdown-cart-total">
                                <span>Total</span>

                                <span class="cart-total-price float-right">&#2547; {{Cart::getSubTotal()}}</span>
                            </div><!-- End .dropdown-cart-total -->

                            <div class="dropdown-cart-action">
                                <a href="{{route('cart.show')}}" class="btn btn-dark btn-block">Checkout</a>
                            </div><!-- End .dropdown-cart-total -->
                        </div><!-- End .dropdownmenu-wrapper -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .dropdown -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->
</header><!-- End .header -->

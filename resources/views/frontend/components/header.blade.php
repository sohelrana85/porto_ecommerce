<header class="header">

    <div class="header-top bg-primary text-uppercase">
        <div class="container">
            <div class="header-left">
                <div class="social-icons">
                    <a href="#" class="social-icon social-instagram icon-instagram" target="_blank"></a>
                    <a href="#" class="social-icon social-twitter icon-twitter" target="_blank"></a>
                    <a href="#" class="social-icon social-facebook icon-facebook" target="_blank"></a>
                </div><!-- End .social-icons -->
            </div><!-- End .header-left -->

            <div class="header-right header-dropdowns ml-0 ml-sm-auto">
                <div class="header-dropdown dropdown-expanded mr-3">
                    <div class="header-menu">
                        <ul>
                            <li><a href="{{ route('customer.myaccount') }}">Track Order</a></li>
                            <li><a href="">Customer Care</a></li>
                            <li><a href="">Careers</a></li>
                            <li><a href="">Blog</a></li>
                            <li><a href="">Contact</a></li>
                            @if (!session('customer_id'))
                                <li><a href="{{ route('customer.login') }}">Signup/Login</a></li>
                            @endif

                        </ul>
                    </div><!-- End .header-menu -->
                </div><!-- End .header-dropown -->
            </div><!-- End .header-right -->

            <div class="header-dropdown ml-4">
                @if (session('customer_id'))
                    <a href="#">{{ session('customer_name') }}'s Account</a>
                @endif
                <div class="header-menu">
                    <ul>
                        <li><a href="{{ route('customer.myaccount') }}">My Account</a></li>
                        <li><a href="{{ route('customer.logout') }}">Logout</a></li>
                    </ul>
                </div><!-- End .header-menu -->
            </div><!-- End .header-dropown -->
        </div><!-- End .container -->
    </div><!-- End .header-top -->


    <div class="header-middle text-dark sticky-header mr-0" style="padding: 1.5rem 0 0;">
        <div class="container" style="margin-bottom: 10px;">
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
                    <form action="{{ route('product.search') }}" method="get">
                        <div class="header-search-wrapper">
                            <input type="search" class="form-control" name="search" id="" placeholder="Search..."
                                required>

                            <button class="btn p-0 icon-search-3" name="" type="submit"></button>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->

                <div class="header-contact d-none d-lg-flex align-items-center pr-xl-5 mr-3 ml-xl-5">
                    <i class="icon-phone-2"></i>
                    <h6 class="pt-1 line-height-1">Call us now<a href="javascript:"
                            class="d-block text-dark ls-10 pt-1">+880 1721 850 242</a></h6>
                </div><!-- End .header-contact -->

                {{-- @if (!session('customer_id'))
                    <a href="{{ route('customer.login') }}" class="header-icon"><i class="icon-user-2"></i></a>
                @endif --}}

                {{-- <a href="#" class="header-icon"><i class="icon-wishlist-2"></i></a> --}}

                <div class="dropdown cart-dropdown" id="cart-reload">
                    <a href="" class="dropdown-toggle dropdown-arrow" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-count badge-circle">{{ \Cart::getContent()->count() }}</span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdownmenu-wrapper">
                            @if (Cart::getContent()->count() != 0)
                                <div class="dropdown-cart-header">
                                    <span>{{ \Cart::getContent()->count() }} Items</span>

                                    <a href="{{ route('cart.show') }}" class="float-right">View Cart</a>
                                </div><!-- End .dropdown-cart-header -->

                                <div class="dropdown-cart-products" style="max-height: 300px; overflow: scroll">

                                    @foreach (\Cart::getContent()->toArray() as $cartitem)
                                        <div class="product">
                                            <div class="product-details">
                                                <h4 class="product-title"
                                                    style="height: 39px;overflow: hidden;text-overflow: ellipsis;">
                                                    <a
                                                        href="{{ route('product', $cartitem['attributes']['slug']) }}">
                                                        {{ $cartitem['name'] }}
                                                    </a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <span class="cart-product-qty">{{ $cartitem['quantity'] }}</span>
                                                    x {{ $cartitem['price'] }}
                                                </span>
                                            </div><!-- End .product-details -->

                                            <figure class="product-image-container" style="min-width: 40px">
                                                <a href="{{ route('product', $cartitem['attributes']['slug']) }}"
                                                    class="product-image">
                                                    <img src="{{ asset('product_photo/' . $cartitem['attributes']['thumbnail']) }}"
                                                        alt="product" style="height: 60px; object-fit: cover">
                                                </a>
                                                <a href="{{ route('cart.remove', $cartitem['id']) }}"
                                                    class="btn-remove icon-cancel" title="Remove Product"></a>
                                            </figure>
                                        </div><!-- End .product -->
                                    @endforeach


                                </div><!-- End .cart-product -->

                                <div class="dropdown-cart-total">
                                    <span>Total</span>

                                    <span class="cart-total-price float-right">&#2547;
                                        {{ \Cart::getSubTotal() }}</span>
                                </div><!-- End .dropdown-cart-total -->

                                <div class="dropdown-cart-action">
                                    <a href="{{ route('customer.checkout') }}"
                                        class="btn btn-dark btn-block">Checkout</a>
                                </div><!-- End .dropdown-cart-total -->
                            @else
                                <div class="cartempty">
                                    <h5 class="text-center p-3 text-primary">Cart is Empty</h5>
                                </div>
                            @endif
                        </div><!-- End .dropdownmenu-wrapper -->
                    </div><!-- End .dropdown-menu -->
                </div><!-- End .dropdown -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
        @yield('topmenu')
    </div><!-- End .header-middle -->

</header><!-- End .header -->

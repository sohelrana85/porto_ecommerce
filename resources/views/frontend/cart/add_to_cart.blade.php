<div class="dropdown-menu">

    <div class="dropdownmenu-wrapper">
        @if (\cart::isEmpty())
            <h5 class="text-center py-3">Cart is Empty!</h5>
        @else
            <div class="dropdown-cart-header">
                <span>{{ count($cart_items) }} Items</span>

                <a href="{{ route('cart.show') }}" class="float-right">View Cart</a>
            </div><!-- End .dropdown-cart-header -->

            <div class="dropdown-cart-products">

                @foreach ($cart_items as $cartitem)
                    <div class="product">
                        <div class="product-details">
                            <h4 class="product-title">
                                <a
                                    href="{{ route('product', $cartitem->attributes->slug) }}">{{ $cartitem->name }}</a>
                            </h4>

                            <span class="cart-product-info">
                                <span class="cart-product-qty">1</span>
                                x {{ $cartitem->price }}
                            </span>
                        </div><!-- End .product-details -->

                        <figure class="product-image-container">
                            <a href="{{ route('product', $cartitem->attributes->slug) }}" class="product-image">
                                <img src="{{ asset('product_photo/' . $cartitem->attributes->thumbnail) }}"
                                    alt="product" style="height: 60px; object-fit: cover">
                            </a>
                            <a href="{{ route('cart.remove', $cartitem->id) }}" class="btn-remove icon-cancel"
                                title="Remove Product"></a>
                        </figure>
                    </div><!-- End .product -->
                @endforeach
            </div><!-- End .cart-product -->

            <div class="dropdown-cart-total">
                <span>Total</span>

                <span class="cart-total-price float-right">&#2547;
                    {{ Cart::getSubTotal() }}</span>
            </div><!-- End .dropdown-cart-total -->

            <div class="dropdown-cart-action">
                <a href="{{ route('cart.show') }}" class="btn btn-dark btn-block">Checkout</a>
            </div><!-- End .dropdown-cart-total -->
    </div><!-- End .dropdownmenu-wrapper -->

    @endif
</div><!-- End .dropdown-menu -->

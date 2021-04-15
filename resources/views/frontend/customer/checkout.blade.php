@extends('frontend.components.layout')

@section('title')
    Checkout
@endsection


@section('topmenu')
    @include('frontend.components.topmenu')
@endsection

@section('content')
    {{-- @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{ $error }}</li>
            @endforeach
        </ul>
    @endif --}}
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </div><!-- End .container -->
        </nav>

        <div class="container">
            <ul class="checkout-progress-bar">
                <li class="active">
                    <span>Shipping</span>
                </li>
                <li>
                    <span>Review &amp; Payments</span>
                </li>
            </ul>
            <div class="row">
                <div class="col-lg-8">
                    <ul class="checkout-steps">
                        <li>
                            <h2 class="step-title">Shipping Address</h2>
                        </li>
                    </ul>

                    <div class="row justify-content-center text-center">
                        @if (session('message'))
                            <div class="col-md-12 alert alert-danger }}">{{ session('message') }}</div>
                        @endif
                    </div>

                    <form action="{{ route('customer.shipping') }}" method="POST">
                        @csrf
                        <div class="row justify-content-center mb-5">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="division">Division *</label>
                                    <select name="division" id="division"
                                        class="form-control dynamic @error('division') is-invalid @enderror"
                                        data-name="district" value="{{ old('division') }}"
                                        style="height: 44px;padding: 10px;">
                                        <option value="">==Select Division==</option>
                                        @foreach ($division as $div)
                                            <option value="{{ $div->division }}">{{ $div->division }}</option>
                                        @endforeach
                                    </select>
                                    <span>@error('division') <div class="text-danger" style="font-size: 12px">
                                                {{ $message }} </div>
                                        @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="district">District *</label>
                                    <select name="district" id="district"
                                        class="form-control dynamic @error('district') is-invalid @enderror"
                                        data-name="thana" style="height: 44px;padding: 10px;">
                                        <option value="">==Select District==</option>
                                    </select>
                                    <span>@error('district') <div class="text-danger" style="font-size: 12px">
                                                {{ $message }} </div>
                                        @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="thana">Thana *</label>
                                    <select name="thana" id="thana"
                                        class="form-control @error('thana') is-invalid @enderror"
                                        value="{{ old('thana') }}" style="height: 44px;padding: 10px;">
                                        <option value="">==Select Thana==</option>
                                    </select>
                                    <span>@error('thana') <div class="text-danger" style="font-size: 12px">
                                                {{ $message }} </div>
                                        @enderror</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Address *</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        name="address" id="address" placeholder="Your Address"
                                        value="{{ old('address') }}" style="height: 44px">
                                    <span>@error('address') <div class="text-danger" style="font-size: 12px">
                                                {{ $message }} </div>
                                        @enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="name">Full Name *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                        id="name" placeholder="Your Name" value="{{ old('name') }}" style="height: 44px">
                                    <span>@error('name') <div class="text-danger" style="font-size: 12px">
                                                {{ $message }} </div>
                                        @enderror</span>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="phone">Phone Number *</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                        name="phone" id="phone" placeholder="11 Digit Number" value="{{ old('phone') }}"
                                        style="height: 44px">
                                    <span>@error('phone') <div class="text-danger" style="font-size: 12px">
                                                {{ $message }} </div>
                                        @enderror</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout-steps-action text-center">
                                    <button type="submit" name="submit" class="btn btn-primary">NEXT</button>
                                </div><!-- End .checkout-steps-action -->
                            </div><!-- End .col-lg-8 -->
                        </div><!-- End .row -->
                    </form>
                </div><!-- End .col-lg-8 -->

                <div class="col-lg-4">
                    <div class="order-summary">
                        <h3>Summary</h3>

                        <h4>
                            <a data-toggle="collapse" href="#order-cart-section" class="collapsed" role="button"
                                aria-expanded="false"
                                aria-controls="order-cart-section">{{ \Cart::getContent()->count() }}
                                products
                                in Cart</a>
                        </h4>

                        <div class="collapse show" id="order-cart-section" style="max-height: 200px; overflow: scroll">
                            <table class="table table-mini-cart">
                                <tbody>
                                    @foreach (\Cart::getContent() as $item)
                                        <tr>
                                            <td class="product-col">
                                                <figure class="product-image-container">
                                                    <a href="{{ route('product', $item->attributes->slug) }}"
                                                        class="product-image">
                                                        <img src="{{ asset('product_photo/' . $item->attributes->thumbnail) }}"
                                                            alt="product">
                                                    </a>
                                                </figure>
                                                <div>
                                                    <h2 class="product-title" style="font-size: 12px;">
                                                        <a
                                                            href="{{ route('product', $item->attributes->slug) }}">{{ $item->name }}</a>
                                                    </h2>

                                                    <span class="product-qty"
                                                        style="font-size: 12px;">Qty:{{ $item->quantity }}</span>
                                                </div>
                                            </td>
                                            <td class="price-col" style="font-size: 12px;">&#2547;
                                                {{ $item->price }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- End #order-cart-section -->
                        <h4 class="font-weight-normal" style="font-size: 13px">
                            <div class="d-flex justify-content-between py-3">
                                <span>Sub Total</span>
                                <span>&#2547; {{ Cart::getSubTotal() }}</span>
                            </div>
                            <div class="d-flex justify-content-between py-3">
                                <span>Estimated Delivery Charge <br>
                                    <small>(Inside Dhaka City)</small></span>
                                <span>&#2547; 60</span>
                            </div>
                        </h4>
                        <h4>
                            <div class="d-flex justify-content-between pt-3 h4">
                                <span>Order Total</span>
                                <span>&#2547; {{ Cart::getSubTotal() + 60 }}</span>
                            </div>
                        </h4>

                    </div><!-- End .order-summary -->
                </div><!-- End .col-lg-4 -->
            </div><!-- End .row -->


        </div><!-- End .container -->

        <div class="mb-6"></div><!-- margin -->
    </main><!-- End .main -->

@endsection

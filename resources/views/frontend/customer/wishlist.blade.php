@extends('frontend.components.layout')

@section('title')
    My Account
@endsection

@section('topmenu')
    @include('frontend.components.topmenu')
@endsection

@section('content')
    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
            </div><!-- End .container -->
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-lg-last dashboard-content">

                    <div class="row justify-content-center">
                        <div class="col-md-10" id="wishlist-reload">
                            <h2 class="mb-0">My Wishlist</h2>
                            <hr class="m-0 mb-2">
                            <table class="table table-borderless">
                                <tbody>
                                    @foreach ($product as $item)
                                        <tr>
                                            <td style="width: 100px">
                                                <a href="{{ route('product', $item->slug) }}">
                                                    <img src="{{ asset('product_photo/' . $item->thumbnail) }}"
                                                        style="width: 80px">
                                                </a>
                                            </td>
                                            <td><a href="{{ route('product', $item->slug) }}">{{ $item->name }}</a></td>
                                            <td>
                                                @if ($item->special_price != '' && $item->special_price != 0)
                                                    @if ($item->special_price_from <= date('Y-m-d') && date('Y-m-d') <= $item->special_price_to)
                                                        <span style="font-size: 13px" class="old-price text-danger">&#2547;
                                                            {{ $item->selling_price }}</span><br>
                                                        <span style="font-size: 13px" class="product-price">&#2547;
                                                            {{ $item->special_price }}</span>
                                                    @else
                                                        <span style="font-size: 13px" class="">&#2547;
                                                            {{ $item->selling_price }}</span>
                                                    @endif
                                                @else
                                                    <span style="font-size: 13px" class="">&#2547;
                                                        {{ $item->selling_price }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="submit" class="btn-icon wishlist-cart"
                                                    style="border: none; cursor: pointer;" value="{{ $item->id }}"><i
                                                        class="icon-shopping-cart"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- End .col-md-6 -->
                    </div><!-- End .row -->
                </div><!-- End .col-lg-9 -->

                @include('frontend.customer.leftmenu')
            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-5"></div><!-- margin -->
    </main><!-- End .main -->

@endsection

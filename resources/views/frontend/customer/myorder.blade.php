@extends('frontend.components.layout')

@section('title')
    My Order
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
                    <li class="breadcrumb-item active" aria-current="page">My Order</li>
                </ol>
            </div><!-- End .container -->
        </nav>

        <div class="container">
            <div class="row">
                <div class="col-lg-9 order-lg-last dashboard-content">
                    {{-- <h2>My Order</h2> --}}

                    <div class="card">
                        <div class="card-header d-flex">
                            <div class="mr-auto">
                                My Order
                            </div>
                        </div><!-- End .card-header -->

                        <div class="card-body">
                            <div class="row">
                                <table class="table table-border text-center">
                                    <thead>
                                        <th>prev</th>
                                        <th>Details</th>
                                        <th>Qty</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody style="font-size: 13px">
                                        @foreach ($product_prev as $item)
                                            <tr>
                                                <td style="width: 60px">
                                                    <img src="{{ asset('product_photo/' . $item->products->thumbnail) }}"
                                                        alt="">
                                                </td>
                                                <td style="width: 300px; text-align:left">{{ $item->product_name }}
                                                </td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ date_format($item->created_at, 'd-M-Y') }}</td>
                                                <td>{{ Str::ucfirst($item->order->status) }}</td>
                                                <td>
                                                    <a href="">Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- End .card-body -->
                    </div><!-- End .card -->


                </div><!-- End .col-lg-9 -->

                @include('frontend.customer.leftmenu')

            </div><!-- End .row -->
        </div><!-- End .container -->

        <div class="mb-5"></div><!-- margin -->
    </main><!-- End .main -->

@endsection

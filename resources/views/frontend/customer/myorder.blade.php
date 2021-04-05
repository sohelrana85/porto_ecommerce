@extends('frontend.components.layout')

@section('title')
    My Order
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
                                <table class="table table-border">
                                    <thead>
                                        <th>Preview</th>
                                        <th>Details</th>
                                        <th>Qty</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody style="font-size: 12px">
                                        <tr>
                                            {{-- <td>{{ $cus_address->full_name }}</td>
                                                <td style="width: 250px">{{ $cus_address->address }}</td>
                                                <td>{{ $cus_address->phone }}</td>
                                                <td>
                                                    @if ($cus_address->default_address == 1)
                                                        Default Address
                                                    @endif
                                                    <br>
                                                    @if ($cus_address->shipping_address == 1)
                                                        Shipping Address
                                                    @endif
                                                    <br>
                                                    @if ($cus_address->billing_address == 1)
                                                        Billing Address
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="">Edit</a>
                                                </td> --}}
                                        </tr>
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

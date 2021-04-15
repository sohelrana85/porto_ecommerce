@extends('backend.components.layout')

@section('title') Manage Order @endsection

@section('content')

    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
        <div class="breadcrumb-title pr-3">Dashboard</div>
        <div class="pl-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Manage Orders</li>
                </ol>
            </nav>
        </div>
        <div class="ml-auto">
            <div class="btn-group">
                {{-- <a href="{{ route('staff.order.create') }}" class="btn btn-primary btn-sm"><i class="bx bx-plus"></i>
                    Add
                    Products</a> --}}
            </div>
        </div>
    </div>
    <!--end breadcrumb-->

    <x-session-message />

    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h4 class="mb-0">Manage Orders</h4>
            </div>
            <hr />
            <div id="tabledata">
                <table id="example" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>sl No</th>
                            <th>order No</th>
                            <th>orderTotal</th>
                            <th>order Date</th>
                            <th>order Status</th>
                            <th>payment Type</th>
                            <th>payment status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ ++$loop->index }}</td>
                                <td>{{ $order->order_no }}</td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td id="order-{{ $order->id }}"><span class="rounded text-light p-1
                                                                @if ($order->status == 'pending') bg-warning
                                    @elseif ($order->status == 'success') bg-success
                                    @elseif ($order->status == 'shipped') bg-info
                                    @elseif ($order->status == 'return') bg-danger @endif">{{ Str::ucfirst($order->status) }}</span>
                                </td>
                                <td>{{ Str::ucfirst($order->payment->payment_type) }}</td>
                                <td><span class="rounded text-light p-1 @if ($order->payment->status
                                        == 'pending') bg-warning
                                    @elseif ($order->payment->status == 'success') bg-success @endif">{{ Str::ucfirst($order->payment->status) }}</span>
                                </td>
                                <td class="d-flex justify-content-center">

                                    <button class="btn btn-light-info btn-sm mr-1" id="view-order" data-toggle="modal"
                                        data-target="#orderdetailsmodal" value="{{ $order->id }}"><i
                                            class="bx bx-info-circle"></i></button>
                                    <button class="btn btn-light-warning btn-sm mr-1" id="edit-order" data-toggle="modal"
                                        data-target="#ordereditmodal" value="{{ $order->id }}"><i
                                            class="bx bx-edit"></i></button>
                                    <form action="{{ route('staff.order.destroy', $order->id) }}" method="POST">
                                        @csrf
                                        @method('Delete')
                                        <button class="btn btn-success btn-sm ml-1"><i class="bx bx-download"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection

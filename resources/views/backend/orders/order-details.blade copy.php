<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">View Order Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body" style="background: #eee">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header bg-light">
                        Order Status
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Order status</th>
                                <td>{{ $order->status }}</td>
                            </tr>
                            <tr>
                                <th>Payment Status</th>
                                <td>{{ $order->payment->status }}</td>
                            </tr>
                            <tr>
                                <th>Shipping Charge</th>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header bg-light">
                        Customer Info
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <td>{{ $order->customer->name }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $order->customer->phone }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $order->customer->email }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $order->customer->address }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header bg-light">
                        Order Info
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Order id</th>
                                <td>{{ $order->id }}</td>
                            </tr>
                            <tr>
                                <th>Order No</th>
                                <td>{{ $order->order_no }}</td>
                            </tr>
                            <tr>
                                <th>Order Date</th>
                                <td>{{ $order->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Amount</th>
                                <td>{{ $order->total }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header bg-light">
                        Shipping Info
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <td>{{ $order->shipping->name }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $order->shipping->phone }}</td>
                            </tr>
                            <tr>
                                <th>Zone</th>
                                <td>{{ $order->shipping->division }}->
                                    {{ $order->shipping->district }}-> {{ $order->shipping->thana }}
                                </td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $order->shipping->address }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header bg-light">
                        Billing Info
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <td>{{ $order->shipping->name }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $order->shipping->phone }}</td>
                            </tr>
                            <tr>
                                <th>Zone</th>
                                <td>{{ $order->shipping->division }}->
                                    {{ $order->shipping->district }}-> {{ $order->shipping->thana }}
                                </td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $order->shipping->address }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-light">
                        Product Info
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Order Id</th>
                                <th>Product Name</th>
                                <th>quantity</th>
                                <th>Product Price</th>
                                <th>Total</th>
                            </tr>
                            @foreach ($order->order_details as $item)
                                <tr>
                                    <td>{{ $item->order_id }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td class="text-right">{{ $item->quantity }}</td>
                                    <td class="text-right">{{ $item->product_price }}</td>
                                    <td class="text-right">
                                        {{ number_format($item->quantity * $item->product_price, 2) }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- {{ $order }} --}}

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</div>

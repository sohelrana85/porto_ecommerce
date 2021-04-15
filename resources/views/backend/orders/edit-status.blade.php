<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Edit Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span
                aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-12">
                <form action="">
                    <div class="form-group row">
                        <label class="col-3" for="order_status" style="font-size: 16px;">Order
                            Status</label>
                        <div class="input-group col-9">
                            <select class="form-control" name="order_status" id="order_status"
                                onchange="getorderval(this)">
                                <option value="Pending" {{ $status->status == 'pending' ? 'selected' : '' }}>
                                    Pending</option>
                                <option value="Success" {{ $status->status == 'success' ? 'selected' : '' }}>
                                    Success</option>
                                <option value="Shipped" {{ $status->status == 'shipped' ? 'selected' : '' }}>
                                    Shipped</option>
                                <option value="Return" {{ $status->status == 'return' ? 'selected' : '' }}>
                                    Return</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3" for="payment_status" style="font-size: 16px;">Payment
                            Status</label>
                        <div class="input-group col-9">
                            <select class="form-control" name="payment_status" id="payment_status"
                                onchange="getpaymentval(this)">
                                <option value="pending" {{ $status->payment->status == 'pending' ? 'pending' : '' }}>
                                    Pending
                                </option>
                                <option value="success" {{ $status->payment->status == 'success' ? 'selected' : '' }}>
                                    Success
                                </option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <input type="hidden" name="p_id" id="p_id" value="{{ $status->payment->id }}">
        <input type="hidden" name="o_id" id="o_id" value="{{ $status->id }}">

        {{-- {{ $status }} --}}

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</div>

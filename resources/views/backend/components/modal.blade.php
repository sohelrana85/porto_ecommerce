    <!-- Modal -->
    <div class="modal fade" id="orderdetailsmodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" id="orderdetailsview">

        </div>
    </div>



    {{-- modal of status change --}}

    <div class="modal fade" id="ordereditmodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" id="ordereditview">
        </div>
    </div>



    <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
    <script>
        function getorderval(value) {
            let o_value = $(value).val();
            let o_id = $('#o_id').val();
            order_edit(o_value, o_id)
        }

        function order_edit($value, $id) {
            let id = $id;
            let order_value = $value;
            $.ajax({
                url: '/staff/order/status/' + id,
                method: 'GET',
                data: {
                    order_value: order_value
                },
                success: function(result) {
                    toastr.success(result.success);
                    order_update(id)
                }
            })
        }

        function order_update($id) {
            let id = $id;
            $.ajax({
                url: '/staff/order/update/' + id,
                method: 'GET',
                data: {},
                success: function(res) {
                    $('#order-' + id).html(res);
                }
            })

        }



        function getpaymentval(pvalue) {
            let p_value = $(pvalue).val();
            let p_id = $('#p_id').val();
            console.log(p_value);
            console.log(p_id);
        }

    </script>

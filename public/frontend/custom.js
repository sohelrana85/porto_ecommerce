//size name show on select
$(document).on('click', '.size-item', function(e){
    e.preventDefault();
    let val = $(this).attr('data-value');
    $('#size-name').html(val);
})

//color name show on select
$(document).on('click', '.color-item', function(e){
    e.preventDefault();
    let val = $(this).attr('data-value');
    $('#color-name').html(val);
})



//QUICK VIEW MODAL LOADER

$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $(document).on('click','.btn-quickview',function(e){
        e.preventDefault();
        $('.bd-example-modal-lg').modal('show');

        let url = $(this).attr('href');
        $.ajax({
            url: url,
            data: {},
            method: 'post',
            success: function (data) {
                $('#quickviewcontent').html(data);
            }
        })
    })
})



//PRODUCT ITEMS INCREMENT AND DECREEMENT

$(document).on('click', '#qtyplus', function(e){
    e.preventDefault();
    let val = $('#quantity').val();

    if(val){
        $('#quantity').val(parseInt( val ) + 1 );
    } else {
        $('#quantity').val( 1);
    }
})

$(document).on('click', '#qtyminus', function(e){
    e.preventDefault();
    let val = $('#quantity').val();
    $('#quantity').val(parseInt( val ) - 1 );
})


// VALIDATION CHECK AND UPDATE CART ITEM FORM PRODUCT DETAILS PAGE

$(document).on('click', '#add-to-cart', function(e){
    e.preventDefault();
    let qty = $('#quantity').val();
    if(qty == '' || qty == 0 ){
        toastr.error('Quantity cannot be empty');
    }
    let productId = $('#id').val();
    let size = $('#size-name').html();
    if(size == ''){
        toastr.error('Select a Size');
    }
    let color = $('#color-name').html();
    if(color == ''){
        toastr.error('Select a color');
    }
    if((qty >= 0) && (size != '') && (color != '')) {

        $.ajax({
            url: "/cart/add",
            method: "post",
            data: {qty: qty, productId:productId,size:size,color:color},
            success: function(result){
                if(result.status === 1){
                    load_cart_item();
                    toastr.success(result.message);
                }
            }
        });
    }

})


// PRODUCT ADD FROM ICON OF THUMBNAIL CART

$(document).on('click', '.btn-add-cart', function(e){
    e.preventDefault();
    let productId = $(this).val();

    $.ajax({
        url: '/cart/add/icon',
        method: 'post',
        data: {productId:productId},
        success: function(res) {
            load_cart_item();
            toastr.success(res.message);
        }
    });
})

function load_cart_item(){
    $.ajax({
        url: '/cart/load-cart-item',
        method: 'post',
        data: {},
        success: function(res) {
            $('#cart-reload').html(res);
        }
    });
}

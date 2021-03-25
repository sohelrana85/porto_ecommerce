$(document).on('click', '.size-item', function(e){
    e.preventDefault();
    $(this).toggleClass('active');
})



$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $(document).on('click','.btn-quickview',function(e){
    // $('.btn-quickview').click(function (e) {
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

    $(".color-item").click(function(){
        $(this).toggleClass("active");
      });

})


$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $('.btn-quickview').click(function (e) {
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


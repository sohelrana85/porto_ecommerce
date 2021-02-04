$(document).ready(function () {
    //Default data table
    $('#example').DataTable({
        ordering: false
    });


});

function specialPriceShow(checked) {
    if (checked == true)
        $(".show_special_price").fadeIn();
    else
        $(".show_special_price").fadeOut();

}
function showWarranty(checked) {
    if (checked == true)
        $(".show_warranty").fadeIn();
    else
        $(".show_warranty").fadeOut();
}

var thumbnailLoad = function (event) {
    var output = document.getElementById('thumbnail_image');
    output.src = URL.createObjectURL(event.target.files[0]);
};

    $('#multiple_image').on('change', function() {
        imagesPreview(this, 'div.gallery');
    })


function slugCreate(text, place) {
    text = text.toLowerCase();
    text = text.replace(/[^a-zA-Z0-9]+/g,'-');
    $(place).val(text);
}

$('#multiple_image_upload').on('change', function(event){

    var files = event.target.files;
    $('#prev_images').html('');
    $.each(files, function(i, file){

        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function (event) {

            var template = '<img style="width: 100px; height: auto;" src = "'+event.target.result+ '">';
            $('#prev_images').append(template);
        }
    })
})

/*
$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })


    $('body').on('submit', '.create-product', function (e) {
        e.preventDefault();

        $.ajax({
            url: '/staff/product',
            method: 'POST',
            // contentType: false,
            // processData: false,
            // data: new formData(this),
            data: $(this).serialize(),
            success: function (data) {
                if ($.isEmptyObject(data.error)) {
                    $('.error-message').css('display', 'none');
                    $('.success-message').css('display', 'bock').find('ul').html(data.success);
                    // toastr.success(data.success);
                    $('.create-product')[0].reset();
                } else {
                    showErrorMessage(data.error)
                    /!*$.each(data.error, function(key,value){
                        toastr.error(value)
                    })*!/
                }
            }
        })
    })
});

function showErrorMessage(message) {
    $('.error-message').css('display', 'block').find('ul').html('');
    $.each(message, function (key, value) {
        $('.error-message').find('ul').append('<li>' + value + '</li>');
    })
}*/

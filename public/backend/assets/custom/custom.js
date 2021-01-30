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

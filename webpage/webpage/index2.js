function readURL1(input) {
    if (input.files && input.files[0]) {


        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview2').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview2').hide();
            $('#imagePreview2').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);

    }
}
$("#imageUpload2").change(function() {
    readURL1(this);
});

function readURL2(input) {
    if (input.files && input.files[0]) {


        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);

    }
}
$("#imageUpload").change(function() {
    readURL2(this);
});
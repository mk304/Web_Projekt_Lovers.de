function readURL(input) {
    if (input.files && input.files[0]) {








        var kuerzeltest = "mk304";


        $.ajax({ type: "POST",  url: "../../register/profil_update.php",
            data: {"bild": input.files[0]},
            contentType: false,
            processData: false,

        });


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
    readURL(this);
});
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>sweetalert</title>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
</head>
<body>

<button type="button" id="new-btn" class="btn btn-primary" >Beitrag Erstellen</button>
<div id="result"></div>
<script>
    var kuerzeltest = "mk304";
    var channeltest = "3";

    $(document).ready(function () {
        $('#new-btn').click(function () {

            swal.mixin({
                input: 'text',
                confirmButtonText: 'Next &rarr;',
                showCancelButton: true,
                progressSteps: ['1', '2', '3']
            }).queue([
                {
                    input: 'file',
                    name: 'file',
                    title: 'Profilbild hochladen',
                    text: 'Empfohlen wird 1X1'
                },
                {
                    input: 'file',
                    title: 'Hintergrundbild hochladen',
                    text: 'Empfohlen wird 16X9'
                },
                {

                    title: 'Über mich',
                    text: ''
                },

            ]).then((result) => {
                if (result.value) {

                    var form_data = new FormData();
                    form_data.append('file', file_data);

                    $.ajax({ type: "POST",  url: "../../register/profil_update.php",
                        data: {"post":result.value[2], "kuerzel": kuerzeltest },



                    });  $.ajax({ type: "POST",  url: "../../register/profil_update.php",
                        data: {"bild":result.value[0],"bild2":result.value[1], "kuerzel": kuerzeltest },

                        cache: false,
                        contentType: false,
                        processData: false,

                    });
                    swal(
                        "Super!",
                        "Dein Profil wurde erfolgreich aktualisiert ",
                        "success"

                    )
                }
            })
        });
    })


</script>




</body>
</html>
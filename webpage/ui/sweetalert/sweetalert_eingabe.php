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


    $(document).ready(function () {
        $('#new-btn').click(function () {

            (async function getText () {
                const {value: text} = await swal({

                    input: 'textarea',
                    inputPlaceholder: 'Schreibe deine Nachricht hier...',
                    showCancelButton: true
                });
                if (text) {
                    $.ajax({ type: "POST",  url: "../register/post_input.php", data: {"post":text, "kuerzel": kuerzel, "channel": channel, "status": status},

                    });
                    swal(
                        "Super!",
                        "Dein Beitrag wurde erfolgreich gespeichert!",
                        "success"


                    )
                    window.location.reload();
                }
            })()
        });
    })

</script>




</body>
</html>
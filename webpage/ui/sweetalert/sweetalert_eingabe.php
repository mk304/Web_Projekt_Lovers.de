<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>sweetalert</title>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>

    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>


    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="neuerheader.css">
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome JS -->

</head>
<body>

<button type="button" id="new-btn" class="btn btn-primary" onclick="post();">Beitrag Erstellen</button>
<p id ="antwort"></p>
<p id ="antwort2"></p>
<script>

        $(document).ready(function () {

        $('#new-btn').click(function () {
            (async function getText () {
                const {value: text} = await swal({
                    input: 'textarea',
                    inputPlaceholder: 'Type your message here...',
                    showCancelButton: true

                });

                var $y = text;

                if (text) {
                    swal(text);
                }
                document.getElementById("antwort").innerHTML = $y ;
                document.getElementById("antwort2").innerHTML = $y ;


            })()
        });
    })

</script>
<script>

</script>




</body>
</html>
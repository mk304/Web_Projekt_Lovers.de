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

<button type="submit" id="new-btn" name="submit" class="btn btn-primary" >Beitrag Erstellen</button>
<div id="result"></div>
<script>


    $(document).ready(function () {
        $('#new-btn').click(function () {

            (async function getImage () {
                Swal({
                    title: 'Das hochgeladene Bild',
                    imageUrl: "https://mars.iuk.hdm-stuttgart.de/~mk304/Web_Projekt/webpage/bildupload/5c111d3c5cc928.29637897mk304.jpg",
                    imageAlt: 'The uploaded picture'
                })

            })()
        });
    })


</script>




</body>
</html>
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

<script>

        $(document).ready(function () {

        $('#new-btn').click(function () {
            var CustomerKey = 1234;//your customer key value.
            swal({
                title: "Add Note",
                input: "textarea",
                showCancelButton: true,
                confirmButtonColor: "#1FAB45",
                confirmButtonText: "Save",
                cancelButtonText: "Cancel",
                buttonsStyling: true
            }).then(function () {
                    $.ajax({
                        type: "POST",
                        url: "YourPhpFile.php",
                        data: { 'CustomerKey': CustomerKey},
                        cache: false,
                        success: function(response) {
                            swal(
                                "Sccess!",
                                "Your note has been saved!",
                                "success"
                            )
                        }
                        failure: function (response) {
                            swal(
                                "Internal Error",
                                "Oops, your note was not saved.", // had a missing comma
                                "error"
                            )
                        }
                    });
                },
                function (dismiss) {
                    if (dismiss === "cancel") {
                        swal(
                            "Cancelled",
                            "Canceled Note",
                            "error"
                        )
                    }
                })

        });
    })

</script>
<script>

</script>




</body>
</html>
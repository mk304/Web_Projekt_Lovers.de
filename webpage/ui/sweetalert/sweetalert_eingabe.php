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
                    inputPlaceholder: 'Type your message here...',
                    showCancelButton: true
                });
                if (text) {
                    $.ajax({ type: "POST",  url: "ajax.php", data: {"post":text},
                        success: function(response) {
                            $('#result').html(response);
                        }
                    });
                    swal(
                        "Sccess!",
                        "Your note has been saved!",
                        "success"

                    )
                }
            })()
        });
    })


</script>




</body>
</html>
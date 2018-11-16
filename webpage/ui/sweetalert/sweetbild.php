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
                const {value: file} = await swal({
                    title: 'Select image',
                    input: 'file',
                    inputAttributes: {
                        'accept': 'image/*',
                        'aria-label': 'Upload your profile picture'
                    }
                })

                if (file) {
                    if (!file) throw null;
                    swal.showLoading();
                    const reader = new FileReader;
                    reader.onload = (e) => {
                        const fd = new FormData;
                        fd.append('file', e.target.result);
                        if (window.XMLHttpRequest) {
                            // code for modern browsers
                            var xmlhttp = new XMLHttpRequest();
                        } else {
                            // code for old IE browsers
                            var xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }
                        xmlhttp.onreadystatechange = function () {
                            // ... do something ...
                        };

                        xmlhttp.open("POST", "../../register/bilder_posts.php", true);
                        xmlhttp.send(fd);
                    };
                    reader.readAsDataURL(file)
                }
            })()
        });
    })


</script>




</body>
</html>
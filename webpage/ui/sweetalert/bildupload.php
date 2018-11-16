<?php
include_once '../../../userdata.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Image Upload with preview</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">


    <link rel="stylesheet" href="style.css">


</head>

<body>





<div class="container">
    <div class="avatar-upload">
        <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="avatar-edit">
            <input type='file' name="file" id="imageUpload" accept=".png, .jpg, .jpeg"/>
            <label name="" for="imageUpload"></label>
        </div>
        <div class="avatar-preview">
            <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
            </div>
        </div>
            <button type="submit" name="submit" for="imageUpload">Upload</button>
        </form>
    </div>
</div>
<p></p>





<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>


<script src="index.js"></script>


</body>

</html>

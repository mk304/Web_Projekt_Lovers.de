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
<?php

    $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
    if(isset($_POST['btn'])){
        $name = $_FILES['myfile']['name'];
        $mime = $_FILES['myfile']['type'];
        $data = mime_content_type($_FILES['myfile']['tmp_name']);
        $stmt = $pdo->prepare("insert into upload_image VALUES ('',?,?,?)");
        $stmt->bindParam(1,$name);
        $stmt->bindParam(2,$mime);
        $stmt->bindParam(3,$data, PDO::PARAM_LOB);
        $stmt->execute();
    }

?>




<div class="container">
    <div class="avatar-upload">
        <form method="post" enctype="multipart/form-data">
        <div class="avatar-edit">
            <input type='file' name="myfile" id="imageUpload" accept=".png, .jpg, .jpeg"/>
            <label name="" for="imageUpload"></label>
        </div>
        <div class="avatar-preview">
            <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
            </div>
        </div>
            <button name="btn" for="imageUpload">Upload</button>
        </form>
    </div>
</div>
<p></p>
<ol>

    <?php
    $stat = $pdo->prepare("select * from upload_image");
    $stat->execute();
    while($row = $stat->fetch()){
        echo "<li><a href='../../bildupload/view.php?id=".$row['id']."' target='_blank'>".$row['name']."</a></li>";
    }
    ?>
</ol>




<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>


<script src="index.js"></script>


</body>

</html>

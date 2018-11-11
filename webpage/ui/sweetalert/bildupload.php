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
    $name=$_FILES['myfile']['name'];
    $type = $_FILES ['myfile']['type'];
    $data = file_get_contents($_FILES['myfile']['tmp_name']);
    $sql = "insert into upload_image VALUES ('',?,?,?)";
    $statement = $pdo->prepare($sql);
    $statement -> bindParam(1,$name);
    $statement -> bindParam(2,$type);
    $statement -> bindParam(3,$data);
    $statement->execute();
}

?>




<div class="container">
    <div class="avatar-upload">
        <form method="post" enctype="multipart/form-data">
        <div class="avatar-edit">
            <input type='file' name="myfile" id="imageUpload" accept=".png, .jpg, .jpeg"/>
            <label name="btn" for="imageUpload"></label>
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
    $sql = "Select * from upload_image ";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    while ($row = $statement->fetch()){
        echo "<li><a target='_blank' href='../../bildupload/view.php?id=".$row['id']."'>".$row."</a>
<embed src='data:".$row['mine'].";base64,".base64_encode($row['data'])."' width='200'</li>";
    }
    ?>
</ol>




<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>


<script src="index.js"></script>


</body>

</html>

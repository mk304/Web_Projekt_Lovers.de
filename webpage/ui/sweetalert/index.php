<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>PHP Blob</title>
</head>
<body>
    <?php
    $dbh = new PDO("mysql:host=localhost;dbname=mydata","root","");
    if(isset($_POST['btn'])){
        $name = $_FILES['myfile']['name'];
        $mime = $_FILES['myfile']['type'];
        $data = file_get_contents($_FILES['myfile']['tmp_name']);
        $stmt = $dbh->prepare("insert into myblob values('',?,?,?)");
        $stmt->bindParam(1,$name);
        $stmt->bindParam(2,$mime);
        $stmt->bindParam(3,$data, PDO::PARAM_LOB);
        $stmt->execute();
    }
    ?>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="myfile"/>
        <button name="btn">Upload</button>
    </form>
    <p></p>
    <ol>
    <?php
    $stat = $dbh->prepare("select * from myblob");
    $stat->execute();
    while($row = $stat->fetch()){
        echo "<li><a href='view.php?id=".$row['id']."' target='_blank'>".$row['name']."</a></li>";
    }
    if {

    }
    ?>
    </ol>
</body>
</html>
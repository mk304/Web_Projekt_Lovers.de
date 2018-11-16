<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>PHP Blob</title>
</head>
<body>
    <?php
    include_once '../../../../userdata.php';
    $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
    if(isset($_POST['btn'])){
        $name = $_FILES['myfile']['name'];
        $mime = $_FILES['myfile']['type'];
        $data = file_get_contents($_FILES['myfile']['tmp_name']);
        $stmt = $pdo->prepare("insert into upload_image VALUES ('',?,?,?)");
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
    $stat = $pdo->prepare("select * from myblob");
    $stat->execute();
    while($row = $stat->fetch()){
        echo "<li><a href='view.php?id=".$row['id']."' target='_blank'>".$row['name']."</a></li>";
    }
    ?>
    </ol>
</body>
</html>
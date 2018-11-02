<?php


include_once '../register/login_test.php';

include_once '../../userdata.php';

session_start();
include_once 'neuerheader.php';

?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2 class="page-header">Comments</h2>

            <button onclick="alert(sessionStorage.getItem('id'))">Check Session Value</button>
            <br>


            <?php
            // Channel "General" als Startseite definieren
            if(!isset($_GET["channel"])) {
                $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
                $sql_3 = "SELECT post from posts";
                $query_3 = $pdo->prepare($sql_3);
                $query_3->execute();
                
                while ($row = $query_3->fetchObject()) {
                    echo "$row->post"."<br>";}
            }


            //Posts aus Channel ausgeben
            $channel = $_GET["channel"];
            $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
            $sql_3 = "SELECT post from posts WHERE channel=:channel";
            $query_3 = $pdo->prepare($sql_3);
            $query_3->execute(array(":channel"=>"$channel"));



            while ($row = $query_3->fetchObject()) {
                echo "$row->post"."<br>";}

            ?>
        </div>
    </div>
</div>


<?php
session_start();
include_once 'footer.php';

?>

<form action="../register/post_input.php" method="post">
    <div class="form-group">
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Post verfassen..." name="post"></textarea>

        <select size="1" name="Channel">
        <?php
        //Channels für Dropdown Menü aus Datenbank ausgeben
        $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
        $sql = "SELECT name from channels";
        $query = $pdo->prepare($sql);
        $query->execute();
        while ($zeile = $query->fetch(PDO::FETCH_ASSOC)) {
        echo "<option value=/".$zeile["name"].'">'. $zeile["name"];}


        ?>
        </select>

        <input type="submit" value="teilen">
    </div>
</form>







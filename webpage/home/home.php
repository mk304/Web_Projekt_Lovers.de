<?php


//include_once '../register/login_test.php';

include_once '../../userdata.php';

session_start();
include_once 'neuerheader.php';

?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->





<!-- First Comment -->
<script>
var  id = <?php $id ?>;
</script>


<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2 class="page-header">Comments</h2>
            <section class="comment-list">

                <button onclick="alert(sessionStorage.getItem('id'))">Check Session Value</button>

                <?php
                $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
                $sql_3 = "SELECT post from posts WHERE channel = '".$id."'";
                $query_3 = $pdo->prepare($sql_3);
                $query_3->execute();

                echo"Wohnungssuche"."<br>";
                while ($row = $query_3->fetchObject()) {
                    echo('<article class="row">
                    <div class="col-md-2 col-sm-2 hidden-xs">
                        <figure class="thumbnail">
                            <img class="img-responsive" src="http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png" />
                            <figcaption class="text-center">username</figcaption>
                        </figure>
                    </div>
                    <div class="col-md-10 col-sm-10">
                        <div class="panel panel-default arrow left">
                            <div class="panel-body">
                                <header class="text-left">
                                    <div class="comment-user"><i class="fa fa-user"></i> That Guy</div>
                                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2014</time>
                                </header>
                                <div class="comment-post">
                                    <p>'.

                                            $row->post.

                                    '</p>
                                </div>
                                <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
                            </div>
                        </div>
                    </div>
                </article>');}
                ?>




            </section>
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



<?php
//Daten aus Channel Wohnungssuche ausgeben
$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));
$sql_3 = "SELECT post from posts WHERE channel='3'";
$query_3 = $pdo->prepare($sql_3);
$query_3->execute();

echo"Wohnungssuche"."<br>";
while ($row = $query_3->fetchObject()) {
    echo "$row->post"."<br>";}

?>



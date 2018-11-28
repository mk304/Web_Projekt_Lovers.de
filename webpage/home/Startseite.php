<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Registrierung</title>

    <!-- Sweetalert 2 -->


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../ui/sweetalert/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="../ui/sweetalert/sweetalert2.min.css">


</head>

<body>

<?php
include_once '../ui/headerstartseite.php';
include_once '../../userdata.php';
session_start();


if ($_SESSION["log"] == "TRUE") {
    //header("Location: ../webpage/home.php");
}

if ($_GET['seite'] == "warning") {
    $message = "wrong answer";
    echo "<script type='text/javascript'>swal('Sie sind bereits registriert. Bitte loggen Sie sich mit Ihrem HdM-Kürzel ein.');</script>";
   echo "<script type='text/javascript'>$(document).ready(function() {
            $(\"#login-form\").style.display='block';
            $(\"#register-form\").style.display='none';
            $('#register-form-link').removeClass('active');
            $('#login-form-link').addClass('active');
        }</script>";

}

?>

<script src="src/jquery-3.3.1.min.js"></script>
<script src="src/fullclip.min.js"></script>
<script src="src/fullclip.js"></script>

<section class="container">

    <div class="fullBackground"></div>


</section>
<div class="grid-box">

    <div class="box1">

    </div>

    <div class="box2">

        <div class="login">
            <div class="row">

                <?php if ($_GET["seite"] == "" or $_GET["seite"] == "warning") {

                    ?>

                    <div class="col-md-11 col-md-offset-8">
                        <div class="panel panel-login" id="start">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <button class="btn btn-light btn-lg btn-block btn-huge" class="active"
                                                style="display: block" id="register-form-link">Registrierung
                                        </button>
                                    </div>
                                    <div class="col-xs-6">
                                        <button class="btn btn-light btn-lg btn-block btn-huge" style="display: block"
                                                id="login-form-link">Login
                                        </button>
                                    </div>

                                </div>
                                <hr>
                            </div>

                            <!-- Formular Registreirung -->
                            <form action="../register/register.php" method="post">
                                <div class="panel-body">
                                    <div class="row">

                                        <form action="../register/do_input_bilder.php" method="post">
                                            <div class="col-lg-12" >
                                                <div id="register-form"
                                                     role="form" style="display: block;">
                                                    <div class="form-group">
                                                        <input type="text" name="kuerzel"
                                                               placeholder="HdM Kürzel eingeben"
                                                               minlength="5" maxlength="5"><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="vorname" placeholder="Vorname"
                                                               minlength="2"
                                                               maxlength="20"><br>
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="text" name="nachname" placeholder="Nachname"
                                                               minlength="2"
                                                               maxlength="20"><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" name="email" placeholder="E-Mail"
                                                               minlength="2"
                                                               maxlength="40"><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" name="pw"
                                                               placeholder="Passwort festlegen"
                                                               minlength="2"
                                                               maxlength="20">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-sm-offset-3">
                                                                <input type="submit" name="register-submit"
                                                                       id="register-submit"
                                                                       tabindex="4" class="form-control btn btn-login"
                                                                       value="Weiter"
                                                                       href="#">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                </div>

                        </div>


                        <form  id="login-form" class="dynamic-content"
                              action="../register/login_check.php?login"
                              method="post"
                              role="form" style="display: none;">
                            <div class="form-group">
                                <input type="text" name="kuerzel" placeholder="HdM Kürzel eingeben"
                                       required="required"
                                       minlength="5" maxlength="5"><br>
                            </div>
                            <div class="form-group">
                                <input type="password" name="pw" placeholder="Passwort eingeben"
                                       required="required" minlength="2"
                                       maxlength="20"></div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <input type="submit" name="login-submit" id="login-submit"
                                               tabindex="4" class="form-control btn btn-login"
                                               value="Log In"
                                               onclick="sessionStorage.setItem('kuerzel');">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row " style=" height: 90vh;
    overflow: scroll;">
                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <a href="https://phpoll.com/recover" tabindex="5"
                                               class="forgot-password">Forgot Password?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    </form>
                <?php } elseif ($_GET["seite"] == "skills") {

                    //zweite div für Checkboxen der Skills

                    ?>

                    <?php


                    $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
                    $sql = "SELECT skill, id from skills";
                    $query = $pdo->prepare($sql);
                    $query->execute();
                    ?>
                    <link rel="stylesheet" href="skills.css">
                    <form style="width: 100%;  height: 500px;
    overflow: scroll;" action="../register/do_skills_input.php"  method="post" ">

                            <h4 class="headline_skills" style="color: #ff253e!important;">Gib deine Skills an</h4>
                            <?php while ($zeile = $query->fetch(PDO::FETCH_ASSOC)) {
                                echo "   <label class='container5' >
                                         <input class='input' type='checkbox' checked=\"checked\" name='" . $zeile['skill'] . "'value='" . $zeile['id'] . "'>" . "<h3>".
                                    $zeile['skill'] . "</h3>"."<span class=\"checkmark\"></span>
                                         </label><br>";
                            }

                            if (!$query){
                                echo "Fehler.";
                            }?>
                            <div class="form-group">
                                <input type="submit" name="register-submit"
                                       id="register-submit2"
                                       tabindex="4" class="input"
                                       value="Weiter"
                                       href="#">
                            </div>
                    </form>



                <?php
                }
                ?>

            </div>


        </div>
    </div>


</div>


<script>

    /*Bildergalerie*/

    $('.fullBackground').fullClip({
        images: ['../bilder/hintergrundbild1.jpg', '../bilder/hintergrundbild2.jpg', '../bilder/hintergrundbild3.jpg', '../bilder/hintergrundbild4.jpg', '../bilder/hintergrundbild5.jpg', '../bilder/hintergrundbild6.jpg'],
        transitionTime: 2000,
        wait: 8000
    });

    /*Login Formular*/
    $(function () {

        $('#register-form-link').click(function () {
            $("#register-form").delay(100).fadeIn(100);
            $("#login-form").fadeOut(100);
            $('#login-form-link').removeClass('active');
            $(this).addClass('active');

        });
        $(function show()
        {
            $('#login-form-link').click(function () {
                $("#login-form").delay(100).fadeIn(100);
                $("#register-form").fadeOut(100);
                $('#register-form-link').removeClass('active');
                $(this).addClass('active');

            });
        });

    });



</script>


<?php
include_once '../ui/footer.php';
?>
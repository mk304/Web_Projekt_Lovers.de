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

// Wenn User bereits eingeloggt ist wird er direkt auf die Home-Seite weitergeleitet.
if ($_SESSION["log"] == "TRUE") {
    header("Location: ../webpage/home.php");
}

// Wenn User die Home-Seite aufrufen möchte, aber noch nicht eingeloggt ist wird er zur Startseite geleitet und ihm wird ein Alert angezeigt.
if ($_GET['seite'] == "login_fail"){
    echo "<script type='text/javascript'>swal('Sie sind noch nicht eingeloggt. Bitte loggen Sie sich mit Ihrem HdM-Kürzel ein.');</script>";
}

// Wenn User bereits registriert ist und versucht sich mit dem gleichen HdM-Kürzel erneut zu registrieren, bekommt er diesen Alert angezeigt.
if ($_GET['seite'] == "warning") {
    $message = "wrong answer";
    echo "<script type='text/javascript'>swal('Sie sind bereits registriert. Bitte loggen Sie sich mit Ihrem HdM-Kürzel ein.');</script>";
}

// Wenn User das falsche Passwort oder Kürzel eingegeben hat erhält er diesen Alert.
if ($_GET['seite'] == "warning_login") {
    $message = "wrong answer";
    echo "<script type='text/javascript'>swal('Ungültiger Benutzername oder Passwort.');</script>";
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
            <div class="row " style="height: auto">
                <!-- Die erste Seite des Registrierungsformulars soll immer dann angezeigt werden, wenn dort noch nicht auf den Button "weiter" geklickt wurde. Es wurden als noch nicht die Skills abgefragt. -->
                <?php if ($_GET["seite"] == "" or $_GET["seite"] == "warning" or $_GET['seite'] == "warning_login" or $_GET['seite'] == "login_fail") {
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

                            <!-- Formular Registrierung -->
                            <form action="../register/register.php" method="post">
                                <div class="panel-body">
                                    <div class="row" >

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

                                                                       tabindex="4" class="form-control btn btn-login"
                                                                       value="Weiter"

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
                                        <input type="submit" name="login-submit"
                                               tabindex="4" class="form-control btn btn-login"
                                               value="Log In"
                                               onclick="sessionStorage.setItem('kuerzel');">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row ">
                                    <div class="col-lg-12">
                                        <div class="text-center">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    </form>
                <?php }
                // Wenn bei der ersten Registrierungsseite das Formular ausgefüllt wurde und auf "weiter" geklickt wurde, soll die zweite Formularseite mit den Checkboxen der Skills angezeigt werden.
                elseif ($_GET["seite"] == "skills") {

                    // Ausgabe der Skills aus der Datenbank
                    $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
                    $sql = "SELECT skill, id from skills";
                    $query = $pdo->prepare($sql);
                    $query->execute();
                    ?>
                    <link rel="stylesheet" href="skills.css">
                    <form style="width: 100%;  height: 500px; overflow: scroll;" action="../register/do_skills_input.php"  method="post" ">

                    <h4 class="headline_skills" style="color: #ff253e!important;">Gib deine Skills an</h4>
                    <?php
                        // Skills werden aus der Datenbank als Checkboxen ausgegeben.
                        while ($zeile = $query->fetch(PDO::FETCH_ASSOC)) {
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
        // Bei Klick auf "Login" soll das Formular zur Registrierung ausgeblendet werden und das Login-Formular eingeblendet werden.
        $('#register-form-link').click(function () {
            $("#register-form").delay(100).fadeIn(100);
            $("#login-form").fadeOut(100);
            $('#login-form-link').removeClass('active');
            $(this).addClass('active');

        });
        $(function show() {
            // Wenn gerade das Login-Formular eingeblendet ist und der User auf "Registrierung" klickt, soll das Login-Formular ausgeblendet und das Registrierungs-Formular eingeblendet werden.
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
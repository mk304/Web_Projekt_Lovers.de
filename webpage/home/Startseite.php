<?php
include_once '../ui/headerstartseite.php';
session_start();

if ($_SESSION["log"] == "TRUE") {
    header("Location: ../webpage/home.php");
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
                    <div class="col-md-11 col-md-offset-8">
                        <div class="panel panel-login" id="start">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <button class="btn btn-light btn-lg btn-block btn-huge" class="active"
                                                style="display: none" id="register-form-link">Registrierung
                                        </button>
                                    </div>
                                    <div class="col-xs-6">
                                        <button class="btn btn-light btn-lg btn-block btn-huge" style="display: none"
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
                                        <div class="col-lg-12">
                                            <div id="register-form"
                                                 role="form" style="display: none;">
                                                <div class="form-group">
                                                    <input type="text" name="kuerzel" placeholder="HdM Kürzel eingeben"
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
                                                                   href="Startseite.php?register-submit=Weiter"
                                                                   onclick="sessionStorage.setItem('kuerzel')">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- zweite div-->
                                        <div class="dynamic-content" style="display: none" id="register-form-seite2">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6 col-sm-offset-3">
                                                        <input type="submit" name="register-submit" id="register-submit"
                                                               tabindex="4" class="form-control btn btn-login"
                                                               value="Weiter"
                                                               href="Startseite.php?register-submit=Weiter"
                                                               onclick="sessionStorage.setItem('kuerzel');addUrl()">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <form id="login-form" class="dynamic-content"
                              action="../register/login_check.php"
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
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <a href="https://phpoll.com/recover" tabindex="5"
                                               class="forgot-password">Forgot Password?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div id="register-form-seite2">
                            <form class="dynamic-content" style="display: none" id="register-form-2" action="#">
                                <div class="form-group">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <input type="submit" name="weiter-submit"
                                               href="Startseite.php?seite=register-form-seite3"
                                               tabindex="4" class="form-control btn btn-login"
                                               value="Weiter"
                                               onclick="sessionStorage.setItem('kuerzel');">
                                    </div>
                                </div>
                                <div>
                            </form>
                        </div>
                    </div>
                </div>

                </form>

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
            $('#login-form-link').click(function () {
                $("#login-form").delay(100).fadeIn(100);
                $("#register-form").fadeOut(100);
                $('#register-form-link').removeClass('active');
                $(this).addClass('active');

            });

        });

        $(document).ready(function () {
            $('#register-form').show();
            $('#register-form-link').show();
            $('#login-form-link').show();
            

        });




    </script>


<?php
include_once '../ui/footer.php';
?>
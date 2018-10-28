<?php
include_once '../ui/headerstartseite.php';
?>


    </selection>
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
                            <div class="panel panel-login">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <button class="btn btn-light btn-lg btn-block btn-huge" class="active" id="register-form-link">Registrierung</button>
                                        </div>
                                        <div class="col-xs-6">
                                            <button class="btn btn-light btn-lg btn-block btn-huge" id="login-form-link">Login</button>
                                        </div>

                                    </div>
                                    <hr>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">

                                            <form id="register-form" action="../register/register.php"
                                                  method="post" role="form" style="display: block;">
                                                <div class="form-group">
                                                    <input type="text" name="kuerzel" placeholder="HdM Kürzel eingeben"
                                                           required="required"
                                                           minlength="5" maxlength="5"><br>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="vorname" placeholder="Vorname"
                                                           required="required" minlength="2"
                                                           maxlength="20"><br>
                                                </div>

                                                    <div class="form-group">
                                                        <input type="text" name="nachname" placeholder="Nachname"
                                                               required="required" minlength="2"
                                                               maxlength="20"><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="email" name="email" placeholder="E-Mail"
                                                               required="required" minlength="2"
                                                               maxlength="40"><br>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" name="pw"
                                                               placeholder="Passwort festlegen" required="required"
                                                               minlength="2"
                                                               maxlength="20">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-sm-offset-3">
                                                                <input type="submit" name="register-submit" id="register-submit"
                                                                       tabindex="4" class="form-control btn btn-login"
                                                                       value="Registrieren">
                                                            </div>

                                                        </div>
                                                    </div>
                                            </form>
                                            <form id="login-form" action="../register/login_check.php"
                                                  method="post"
                                                  role="form" style="display: none;">
                                                <div class="form-group">
                                                    <input type="text" name="kuerzel" placeholder="HdM Kürzel eingeben"
                                                           required="required"
                                                           minlength="5" maxlength="5"><br>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="pw" placeholder="Passwort festlegen"
                                                           required="required" minlength="2"
                                                           maxlength="20"></div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-sm-offset-3">
                                                            <input type="submit" name="login-submit" id="login-submit"
                                                                   tabindex="4" class="form-control btn btn-login"
                                                                   value="Log In">
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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

                $('#register-form-link').click(function (e) {
                    $("#register-form").delay(100).fadeIn(100);
                    $("#login-form").fadeOut(100);
                    $('#login-form-link').removeClass('active');
                    $(this).addClass('active');
                    e.preventDefault();
                });
                $('#login-form-link').click(function (e) {
                    $("#login-form").delay(100).fadeIn(100);
                    $("#register-form").fadeOut(100);
                    $('#register-form-link').removeClass('active');
                    $(this).addClass('active');
                    e.preventDefault();

                    document.getElementById('focusmeplease').focus();
                });

            });

        </script>


<?php
include_once '../ui/footer.php';
?>
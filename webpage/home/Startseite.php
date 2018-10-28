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

        <form>
            <h1>Registrieren</h1>
            <input type="text" name="kuerzel" placeholder="HdM Kürzel eingeben" required="required" minlength="5" maxlength="5"><br>
            <input type="text" name="vorname" placeholder="Vorname" required="required" minlength="2" maxlength="20"><br>
            <input type="text" name="nachname" placeholder="Nachname" required="required" minlength="2" maxlength="20"><br>
            <input type="email" name="email" placeholder="E-Mail" required="required" minlength="2" maxlength="40"><br>
            <input type="password" name="pw" placeholder="Passwort festlegen" required="required" minlength="2" maxlength="20">
            <br><br>
            <br><br>
            <input class = "submit" type="submit" value="Registrieren">
        </form>
        </div>

            </div>

    </div>

        <script>
        $('.fullBackground').fullClip({
            images: ['../bilder/hintergrundbild1.jpg', '../bilder/hintergrundbild2.jpg', '../bilder/hintergrundbild3.jpg', '../bilder/hintergrundbild4.jpg','../bilder/hintergrundbild5.jpg','../bilder/hintergrundbild6.jpg'],
            transitionTime: 2000,
            wait: 8000
        });

    </script>







<?php
include_once '../ui/footer.php';
?>
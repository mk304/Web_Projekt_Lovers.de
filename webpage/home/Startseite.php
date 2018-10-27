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
        <div class="box1">box 1</div>
        <div class="box2">box 2</div>

    </div>

        <script>
        $('.fullBackground').fullClip({
            images: ['../bilder/hintergrundbild1.jpg', '../bilder/hintergrundbild2.jpg', '../bilder/hintergrundbild3.jpg', '../bilder/hintergrundbild4.jpg','../bilder/hintergrundbild5.jpg','../bilder/hintergrundbild6.jpg'],
            transitionTime: 2000,
            wait: 5000
        });

    </script>







<?php
include_once '../ui/footer.php';
?>
<?php


include_once '../../userdata.php';

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Campus</title>

    <!-- Sweetalert 2 -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../ui/sweetalert/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="../ui/sweetalert/sweetalert2.min.css">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Unser CSS -->
    <link rel="stylesheet" href="profilbearbeiten.css">


    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
            integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
            crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
            integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
            crossorigin="anonymous"></script>


    <script>

        $(document).ready(function () {
        }

    </script>

</head>

<body>

<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Web_Projekt_
                Lovers.de</h3>
        </div>

        <ul class="list-unstyled components">
            <p>Channels</p>
            <li class="active">
            <li class="nav-item ">
                <a class="nav-link  " href="#">
                    <i class="fa fa-envelope-o ">
                        <span class="badge badge-danger ">11</span>
                    </i>
                    Messages
                </a>
                <form id="channel_id" method="get">
                    <?php
                    //Channels für Navigation aus Datenbank ausgeben
                    $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
                    $sql = "SELECT name, channel_id from channels";
                    $query = $pdo->prepare($sql);
                    $query->execute();
                    while ($zeile = $query->fetch(PDO::FETCH_ASSOC)) {
                        echo "<a class='channel' onClick='sessionStorage.channel=" . $zeile['channel_id'] . "' name='channel' href='home.php?channel=".$zeile['channel_id']."'>" . $zeile["name"]."</a>";


                        $_SESSION ["channel"]="1";
                    }

                    ?>

                </form>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <li>
                <a href="#" class="download">Profil Bearbeiten</a>
            </li>
            <li>
                <a href="../register/logout.php" class="article">Abmelden</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content Holder -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="navbar-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">



                        </li>
                        <li class="nav-item">
                            <img src="../bilder/user.png" width="39" height="39" alt="">
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="titelbild">
            <img src="../bilder/titelbild.jpg" width="100%" height="100%" alt="">

        </div>



    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
    });
</script>
</body>

</html>

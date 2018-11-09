<?php


include_once '../../userdata.php';
session_start();
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
    <link rel="stylesheet" href="../ui/neuerheader.css">
    <link rel="stylesheet" href="../webpage/profil.css">



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
                    echo "<a class='channel' onClick='sessionStorage.channel=" . $zeile['channel_id'] . "' name='channel' href='../webpage/home.php'>General</a>";
                    while ($zeile = $query->fetch(PDO::FETCH_ASSOC)) {
                        echo "<a class='channel' onClick='sessionStorage.channel=" . $zeile['channel_id'] . ";sessionStorage.name=" . $zeile['name'] . "' name='channel' href='home.php?channel=".$zeile['channel_id']."'>" . $zeile["name"]."</a>";
                        $_SESSION ["channel"]="1";
                    }


                        ?>
                    </form>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <li>
                <a href="../webpage/profil.php" class="download">Profil Bearbeiten</a>
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


                        <li class="nav-item">
                            <a class="nav-link" href="#"></a>
                        </li>
                        <li class="nav-item">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"></a>
                        </li>

                        <li class="nav-item">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"></a>
                        <li class="nav-item">

                            <button type="button" id="new-btn" class="btn btn-primary">Beitrag Erstellen</button>
                            <script>
                                var kuerzeltest = sessionStorage.getItem('kuerzel');
                                var channeltest = sessionStorage.getItem('channel');

                                $(document).ready(function () {
                                    $('#new-btn').click(function () {

                                        (async function getText () {
                                            const {value: text} = await swal({
                                                input: 'textarea',
                                                inputPlaceholder: 'Schreibe deine Nachricht hier...',
                                                showCancelButton: true
                                            });
                                            if (text) {
                                                $.ajax({ type: "POST",  url: "../register/post_input.php", data: {"post":text, "kuerzel": kuerzeltest, "channel": channeltest},

                                                });
                                                swal(
                                                    "Super!",
                                                    "Dein Beitrag wurde erfolgreich gespeichert!",
                                                    "success"

                                                )
                                            }
                                        })()
                                    });
                                })


                            </script>

                        </li>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"></a>
                        </li>
                        <li class="nav-item">
                            <img src="../bilder/user.png" width="39" height="39" alt="">
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


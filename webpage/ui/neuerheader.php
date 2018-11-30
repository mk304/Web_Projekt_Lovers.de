<?php


include_once '../../userdata.php';
session_start();
$kuerzel = $_SESSION["kuerzel"];

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
    <!-- sweet-modal  -->
    <link rel="stylesheet" href="path/to/sweetmodal/dist/min/jquery.sweet-modal.min.css"/>
    <script src="path/to/sweetmodal/dist/min/jquery.sweet-modal.min.js"></script>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Unser CSS -->
    <link rel="stylesheet" href="../ui/neuerheader.css">


    <!-- Font Awesome JS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+SC:900" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
            integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
            crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
            integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
            crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


    <meta http-equiv="Cache-Control" content="no-store"/>


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
            <h3>HdM-Connect</h3>
        </div>

        <ul class="list-unstyled components">
            <p>Channels</p>
            <li class="active">

                <form id="channel_id" method="get">
                    <?php


                    //Channels für Navigation aus Datenbank ausgeben
                    $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
                    $sql = "SELECT name, channel_id from channels";
                    $query = $pdo->prepare($sql);
                    $query->execute();
                    echo "<a class='channel' onClick='sessionStorage.channel=" . $zeile['channel_id'] . "' name='channel' href='../webpage/home.php'>General</a>";

                    while ($zeile = $query->fetch(PDO::FETCH_ASSOC)) {
                        echo "<a class='channel' onClick='sessionStorage.channel=" . $zeile['channel_id'] . ";sessionStorage.name=" . $zeile['name'] . "' name='channel' href='../webpage/home.php?channel=" . $zeile['channel_id'] . "'>" . $zeile["name"] . "</a>";

                        $_SESSION['channel'] = $_GET['channel'];
                    }


                    ?>
                </form>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <li>
                <button style="width:100%;" type="button" id="new-btn2" class="btn btn-light">Neuen Channel anlegen</button>
                <script>

                    $(document).ready(function () {
                        $('#new-btn2').click(function () {

                            (async function getText() {
                                const {value: text} = await swal({
                                    input: 'textarea',
                                    inputPlaceholder: 'Bitte neuen Channelnamen eingeben',
                                    showCancelButton: true
                                });
                                //text noch nach untersuchen <> XCC string search method!
                                if (text && text.search("<") == -1) {
                                    $.ajax({
                                        type: "POST",
                                        url: "../register/do_channel_input.php",
                                        data: {
                                            "channel": text

                                        },

                                    });
                                    swal(
                                        "Super!",
                                        "Ein neuer Channel wurde erfolgreich angelegt!",
                                        "success"
                                    )
                                    window.location.reload();
                                } else swal({
                                    type: 'error',
                                    title: 'Oops...',
                                    text: 'Ungültiger Text!',

                                })
                            })()
                        });
                    })


                </script>
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

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                        aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                    <ul class="nav navbar-nav ml-auto ">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" id="dropdown01" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">Nachrichten
                                <?php

                                //auszählen der Anzahl der ungelesenen Nachrichten
                                $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));

                                $statement = $pdo->prepare("SELECT * from notification WHERE $kuerzel IS NULL AND post =ANY (SELECT posts_id FROM posts WHERE kuerzel = ANY (SELECT folgt FROM abonnenten WHERE kuerzel=:kuerzel))");
                                $statement->execute(array(":kuerzel"=>"$kuerzel"));
                                $anzahl_notification = $statement->rowCount();


                                ?>
                                <span class="badge badge-danger"><?php echo $anzahl_notification ?></span>

                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                                <?php
                                // wenn es Nachrichten gibt, dann zeige Klasse 'dropdown-item', ansonsten führe else aus 'Keine neuen Nachrichten'
                                if ($anzahl_notification > 0) {


                                    $sql = "SELECT post, date, kuerzel, channel, posts_id, bild_id from posts where posts_id = 
                                                ANY (SELECT post FROM notification WHERE $kuerzel IS NULL) AND kuerzel = ANY (SELECT folgt FROM abonnenten WHERE kuerzel=:kuerzel) ORDER BY date DESC ";
                                    $query = $pdo->prepare($sql);
                                    $query->execute(array(":kuerzel"=>"$kuerzel"));
                                    $rows = array();
                                    while ($row = $query->fetch(PDO::FETCH_ASSOC))
                                        $rows[] = $row;

                                    ?>



                                    <a class="dropdown-item"
                                           href="../register/do_alle_gelesen.php?channel=<?php echo $row['channel'] ?>">
                                            <div>
                                    Alle neuen Nachrichten löschen
                                    <br>
                                                <div class="dropdown-divider"></div>
                                        </a>

                                    <?php
                                    
                                    foreach ($rows as $row) {

                                        ?>

                                        <?php

                                        if ($row['bild_id'] == NULL) {
                                            ?>
                                            <a class="dropdown-item"
                                               href="../webpage/do_gelesen.php?channel=<?php echo $row['channel'] ?>&posts_id=<?php echo $row['posts_id'] ?>">
                                                <small><i>
                                                        <?php
                                                        echo date('F j, Y, g:i a', strtotime($row['date']));
                                                        ?>
                                                    </i></small>
                                                <br/>


                                                <div>

                                                    Ein neuer Beitrag von
                                                    <?php
                                                    echo $row['kuerzel']; ?>:
                                                    <br>

                                                    <?php
                                                    echo $row['post'] ?>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <?php
                                        }

                                        elseif ($row['post'] == NULL) {
                                            ?>
                                            <a class="dropdown-item"
                                               href="../webpage/do_gelesen.php?channel=<?php echo $row['channel'] ?>&posts_id=<?php echo $row['posts_id'] ?>">
                                                <small><i>
                                                        <?php
                                                        echo date('F j, Y, g:i a', strtotime($row['date']));
                                                        ?>
                                                    </i></small>
                                                <br/>


                                                <div>

                                                    <?php
                                                    echo $row['kuerzel']; ?>
                                                    <br>
                                                    hat ein neues Bild hochgeladen
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <?php
                                        }
                                }
                                }else {
                                    echo 'Keine neuen Nachrichten.';
                                }
                                ?>

                            </div>


                        <li class="nav-item">
                            <a class="nav-link" href="#"></a>
                        </li>


                        <form class="form-inline my-2 my-lg-0" id="search-form" action="../register/do_search.php"
                              method="post">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                                   name="search">
                            <button class="btn btn-danger" type="submit">Search</button>
                        </form>
                        <li class="nav-item">

                        </li>

                        <li class="nav-item">

                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"></a>
                        </li>
<!-- Button verstecken im General -->
                        <?php if ($_GET["channel"] == "") {

         }
                        else {
                            ?>

                        <button type="button" id="new-btn" class="btn btn-danger ">Beitrag Erstellen</button>
                        <script>
                            var kuerzel = sessionStorage.getItem('kuerzel');
                            var channel = sessionStorage.getItem('channel');
                            var status = "unread";

                            $(document).ready(function () {
                                $('#new-btn').click(function () {

                                    (async function getText() {
                                        const {value: text} = await swal({
                                            input: 'textarea',
                                            inputPlaceholder: 'Schreibe deine Nachricht hier...',
                                            showCancelButton: true
                                        });
                                        //text noch nach untersuchen <> XCC string search method!
                                        if (text && text.search("<") == -1) {
                                            $.ajax({
                                                type: "POST",
                                                url: "../register/post_input.php",
                                                data: {
                                                    "post": text,
                                                    "kuerzel": kuerzel,
                                                    "channel": channel,
                                                    "status": status
                                                },

                                                });
                                                swal(
                                                    "Super!",
                                                    "Dein Beitrag wurde erfolgreich gespeichert!",
                                                    "success"
                                                )
                                                window.location.reload();
                                            } else swal({
                                                type: 'error',
                                                title: 'Oops...',
                                                text: 'Ungültiger Text!',

                                            })
                                        })()
                                    });
                                })


                            </script>
                            <?php
                        }


                        if ($_GET["channel"] == "") {

                        }
                        else {

                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#"></a>
                            <li class="nav-item">
                            
                        <li class="nav-item">

                            <div class="avatar-upload">

                                <form action="../register/bilder_posts.php" method="post" enctype="multipart/form-data">

                                    <div class="btn btn-danger btn-sm" style="height: 39px">
                                        <input style="	width: 0.1px;height: 0.1px;opacity: 0;overflow: hidden;position: absolute;z-index: -1;} "
                                               type='file' name="file" id="imageUpload3" accept=".jpg, .jpeg"/>
                                        <label name="" for="imageUpload3" style="margin-top: 4px;"> Bild
                                            auswählen</label>

                                        <button id="ajax" type="submit" class="btn btn-danger" name="submit"
                                                for="imageUpload3" style="height: 30px; margin-top: -5px;">Hochladen
                                        </button>

                                    </div>


                                </form>


                        </li>
                        <?php
                        }
                        ?>

                        <li class="nav-item">
                            <a class="nav-link" href="#"></a>
                        <li class="nav-item">


                        <li class="nav-item">
                            <div class="headerprofilbild">
                                <a href="https://mars.iuk.hdm-stuttgart.de/~mk304/Web_Projekt/webpage/webpage/profil.php">
                                    <?php
                                    $file_pointer = '../profilbilder/profilbild' . $kuerzel . '.jpg';

                                    if (file_exists($file_pointer)) {
                                        echo "<img src=\"$file_pointer\">";
                                    } else {
                                        echo "<img src=\"../profilbilder/profilbild.jpg\" width=\"39\" height=\"39\" alt=\"\">";
                                    }
                                    ?>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
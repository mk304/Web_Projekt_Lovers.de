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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
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

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                        aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                    <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="dropdown01" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">Nachrichten
                                    <?php

                                    //auszählen der Anzahl der ungelesenen Nachrichten
                                    $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));

                                    $statement = $pdo->prepare("SELECT * from posts WHERE status = 'unread'");
                                    $statement->execute();
                                    $anzahl_notification = $statement->rowCount();

                                    ?>
                                    <span class="badge badge-primary"><?php echo $anzahl_notification ?></span>

                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdown01">
                                    <?php
                                    // wenn es Nachrichten gibt, dann zeige Klasse 'dropdown-item', ansonsten führe else aus 'Keine neuen Nachrichten'
                                    if ($anzahl_notification > 0) {
                                        $sql = "SELECT post, date, kuerzel, channel, posts_id from posts where status = 'unread'ORDER BY date DESC ";
                                        $query = $pdo->prepare($sql);
                                        $query->execute();
                                        $rows = array();
                                        while ($row = $query->fetch(PDO::FETCH_ASSOC))
                                            $rows[] = $row;
                                        foreach ($rows as $row){


                                            ?>
                                            <a class="dropdown-item" href="../webpage/do_gelesen.php?channel=<?php echo $row['channel']?>&posts_id=<?php echo $row['posts_id']?>">
                                                <small><i>
                                                        <?php
                                                        echo date('F j, Y, g:i a',strtotime($row['date']));
                                                        ?>
                                                    </i></small>
                                                <br/>
                                                Ein neuer Beitrag von
                                                <?php
                                                echo $row['kuerzel'];?>:
                                                <br>
                                                <?php
                                                echo $row['post'] ?>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <?php
                                        }
                                    } else {
                                        echo 'Keine neuen Nachrichten.';
                                    }
                                    ?>

                                </div>


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
                                var kuerzel = sessionStorage.getItem('kuerzel');
                                var channel = sessionStorage.getItem('channel');
                                var status ="unread";

                                $(document).ready(function () {
                                    $('#new-btn').click(function () {

                                        (async function getText () {
                                            const {value: text} = await swal({
                                                input: 'textarea',
                                                inputPlaceholder: 'Schreibe deine Nachricht hier...',
                                                showCancelButton: true
                                            });
                                            if (text) {
                                                $.ajax({ type: "POST",  url: "../register/post_input.php", data: {"post":text, "kuerzel": kuerzel, "channel": channel, "status": status},

                                                });
                                                swal(
                                                    "Super!",
                                                    "Dein Beitrag wurde erfolgreich gespeichert!",
                                                    "success"


                                                )
                                                window.location.reload();
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


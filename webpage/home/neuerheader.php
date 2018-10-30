<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Campus</title>
    <!--Beitrag erstellen -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="neuerheader.css">
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
            integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
            crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
            integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
            crossorigin="anonymous"></script>
    <script src="src/sidebar.js"></script>
    <script>
        $(document).ready(function () {
            $("#beitrag-btn").click(function () {
                $("#beitragbox").fadeIn('slow');
            });
        });


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
                <a href="#"></a>
                <a href="#">Allgemein</a>
                <a href="#">Was geht heute?</a>

                <a href="#">Wohnungssuche</a>
                <a href="#">Jobbörse</a>
                <a href="#">Praktikumssemester</a>
            </li>
            <li>
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"
                   class="dropdown-toggle">HdM-abroad</a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                        <a href="#">Auslandssemester</a>
                    </li>
                    <li>
                        <a href="#">Auslandspraktikum</a>
                    </li>
                    <li>
                        <a href="#">Erfahrungsberichte</a>
                    </li>
                    <li>
                        <a href="#">HdM-Internationals</a>
                    </li>
                </ul>
            </li>
            <li>

                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
                   class="dropdown-toggle">Studiengänge</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a href="#">ONLINE-MEDIEN-MANAGEMENT</a>
                    </li>
                    <li>
                        <a href="#">BIBLIOTHEKS- UND INFORMATIONSMANAGEMENT</a>
                    </li>
                    <li>
                        <a href="#">WIRTSCHAFTSINFORMATIK UND DIGITALE MEDIEN</a>
                    </li>
                    <li>
                        <a href="#">INFORMATIONSDESIGN</a>
                    </li>
                    <li>
                        <a href="#">AUDIOVISUELLE MEDIEN</a>
                    </li>
                    <li>
                        <a href="#">CROSSMEDIA-REDAKTION/PUBLIC RELATIONS</a>
                    </li>
                    <li>
                        <a href="#">MEDIENWIRTSCHAFT</a>
                    </li>
                    <li>
                        <a href="#">WERBUNG UND MARKTKOMMUNIKATION</a>
                    </li>
                    <li>
                        <a href="#">DRUCK UND MEDIENTECHNOLOGIE</a>
                    </li>
                    <li>
                        <a href="#">VERPACKUNGSTECHNIK</a>
                    </li>
                    <li>
                        <a href="#">DIGITAL PUBLISHING</a>
                    </li>
                    <li>
                        <a href="#">INTEGRIERTES PRODUKTDESIGN</a>
                    </li>
                    <li>
                        <a href="#">MEDIAPUBLISHING</a>
                    </li>
                    <li>
                        <a href="#">MEDIENINFORMATIK</a>
                    </li>
                    <li>
                        <a href="#">MOBILE MEDIEN</a>
                    </li>
                    <li>
                        <a href="#">PRINT MEDIA TECHNOLOGIES</a>
                    </li>

                    <li>
                        <a href="#">WIRTSCHAFTSINGENIEURWESEN MEDIEN</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#">FAQ</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>

        <ul class="list-unstyled CTAs">
            <li>
                <a href="#" class="download">Profil Bearbeiten</a>
            </li>
            <li>
                <a href="#" class="article">Abmelden</a>
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
                            <button type="button"" id="beitrag-btn" class="btn btn-primary">Beitrag Erstellen</button>
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
        <form action="../register/post_input.php" method="post">
            <div class="form-group" id="beitragbox" style="display: none;">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" placeholder="Post verfassen..."
                      name="post"></textarea>
                <br>
                <label for="sel1">Select Channel</label for="sel1">
                <select id="sel1" class="form-control" size="1" name="Channel">
                    <?php
                    //Channels für Dropdown Menü aus Datenbank ausgeben
                    $pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset' => 'utf8'));
                    $sql = "SELECT name from channels";
                    $query = $pdo->prepare($sql);
                    $query->execute();
                    while ($zeile = $query->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value=/" . $zeile["name"] . '">' . $zeile["name"]."</option>";
                    }
                    ?>
                </select>
                <button type="submit-btn" value="teilen" class="btn btn-primary">teilen</button>
                <button type="abort-btn">Abbrechen</button>
            </div>
        </form>


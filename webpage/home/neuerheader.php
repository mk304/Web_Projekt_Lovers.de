<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Campus</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="neuerheader.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

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
                      <a href="#">Auslandssemester</a>
                    <a href="#">Praktikumssemester</a>
                    <a href="#">Wohnungssuche</a>
                    <a href="#">Jobbörse</a>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Infomation und Kommunikation</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
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
                    </ul>
                </li>
                <li>

                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Electronic Media</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
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
                    </ul>
                </li>
                <li>
                    <a href="#">Portfolio</a>
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
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"></a>
                            </li>
                            <li class="nav-item">
                                <img src="../bilder/user.png" width="45" height="45" alt="">
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            
            </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

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
<link rel="stylesheet" href="posts.css">

<?php

include_once '../../userdata.php';
include_once '../register/login_test.php';
include_once '../ui/neuerheader.php';
session_start();


$pdo = new PDO ($dsn, $dbuser, $dbpass, array('charset'=>'utf8'));

echo"<h2>Suchergebnisse</h2>";


if (isset($_POST['search'])) {

    $suche = $_POST['search'];
    // Suche nach Personen
    $statement = $pdo->prepare("SELECT kuerzel, vorname, nachname FROM user WHERE kuerzel=:suche OR vorname=:suche OR nachname=:suche");

        if ($statement->execute(array(":suche"=>"$suche", ":vorname"=>"$suche", ":nachname"=>"$suche"))) {
            if ($anzahl_treffer = $statement->rowCount() > 0){
                echo"<h3>Personen</h3>"."<br>";
            }
            else {
                echo "Ihre Suche hat leider keinen Treffer ergeben.";

            }

        while ($row = $statement->fetch()) {
          ?>
          <table>
              <tr><td>
                      <?php
                      echo"<div class='text'>";

                      $file_pointer = '../profilbilder/profilbild'.($row->kuerzel).'.jpg';
                      echo"</div><div class='profil_bild_post' ><a class='atag' href='../webpage/profil_check.php?profilname=$row->kuerzel'>";
                      if (file_exists($file_pointer))
                      {
                          echo "<img src=\"$file_pointer\">";
                      }
                      else
                      {
                          echo "<img src=\"../profilbilder/profilbild.jpg\">";
                      }
                      echo "</div></div>";
                      ?>
                  </td>
                  <td> <?php echo $row["vorname"]." ".$row["nachname"]?><br> <a href="../webpage/profil_anderer.php?profilname=<?php $row["kuerzel"] ?>"><?php echo $row["kuerzel"]?></a>
                     <br> <a>Skills: </a>
                  </td>

              </tr>
          </table>
            <hr/>
        <?php
            }
    }}




//$statement = $pdo->prepare("SELECT post FROM posts WHERE post=:suche");

//if ($statement->execute(array(":suche"=>"$suche"))) {
  //  while ($row = $statement->fetch()) {
   //     echo $row['post'];
 //   }}

?>
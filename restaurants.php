<!DOCTYPE html>
<html>
 <head>
  <title>Restaurants du quartier</title>
  <meta charset="utf-8">
 </head>
 <body>
  <?php
    include("menu.inc.php");
  ?>
  <h1>Restaurants du quartier</h1>

  <h2>Voici les restaurants du quartier</h2>

  <p>
   Cliquez sur le nom d'un restaurant
   pour voir sa description.
  </p>

  <ul>

<?php

$base = new PDO(
  "mysql:host=localhost;dbname=resto",
  "root",
  ""
);

$id_quartier = $_REQUEST['id_quartier'];


// optionnel : affichage du nom du quartier

$requete = $base->query(
  "select nom from quartier where id=$id_quartier"
);

$ligne = $requete->fetch();

echo 'Voici les restaurants du quartier ';
echo $ligne['nom'];

// fin optionnel


$requete = $base->query(
  "select * from restaurant where id_quartier=$id_quartier"
);

while($ligne = $requete->fetch()) {

  echo '<li>';
  echo '<a href="fiche_restaurant.php?id=';
  echo $ligne['id'];
  echo '">';
  echo $ligne['nom'];
  echo '</li>';

}

?>

  </ul>

 </body>
</html>

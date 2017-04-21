<!DOCTYPE html>
<html>
 <head>
  <title>Site des restaurants des quartiers de la ville</title>
  <meta charset="utf-8">
 </head>
 <body>
  <?php
    include("menu.inc.php");
  ?>
  <h1>Site des restaurants des quartiers de la ville</h1>

  <h2>Voici les quartiers</h2>

  <p>
   Cliquez sur le nom d'un quartier
   pour voir la liste des restaurants du quartier.
  </p>

  <ul>

<?php

$base = new PDO(
  "mysql:host=localhost;dbname=resto",
  "root",
  ""
);

$requete = $base->query("select * from quartier");

while($ligne = $requete->fetch()) {

  echo '<li>';
  echo '<a href="restaurants.php?id_quartier=';
  echo $ligne['id'];
  echo '">';
  echo $ligne['nom'];
  echo '</li>';

}

?>

  </ul>

 </body>
</html>

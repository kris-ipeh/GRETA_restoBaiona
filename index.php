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
   <li>
    <a href="restaurants.php?id_quartier=1">
     Petit Bayonne
    </a>
   </li>
   <li>
    <a href="restaurants.php?id_quartier=2">
     Moyen Bayonne
    </a>
   </li>
   <li>
    <a href="restaurants.php?id_quartier=3">
     Grand Bayonne
    </a>
   </li>
   <li>
    <a href="restaurants.php?id_quartier=4">
     Enorme Bayonne
    </a>
   </li>
  </ul>

 </body>
</html>

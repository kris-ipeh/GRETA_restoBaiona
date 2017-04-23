<?php include("entete.php"); ?>

<?php

$id_quartier = $_REQUEST['id_quartier'];

$requete = $base->prepare(
  "select nom from quartier where id=:id_quartier"
);

$requete->bindValue(":id_quartier", $id_quartier);

$requete->execute();

$ligne = $requete->fetch();

?>

<p class="lead">
 Voici les restaurants du quartier
 <?php
  echo $ligne['nom'];
 ?>
</p>

<p>
 Cliquez sur le nom d'un restaurant
 pour voir sa description.
</p>

<ul>

<?php

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

<?php include("pieddepage.php"); ?>

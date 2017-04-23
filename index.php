<?php include("entete.php"); ?>

<p class="lead">Voici les quartiers</p>

<p>
 Cliquez sur le nom d'un quartier
 pour voir la liste des restaurants du quartier.
</p>

<ul>

<?php

$requete = $base->query("select * from quartier");

while($ligne = $requete->fetch()) {

  echo '<li>';
  echo '<a href="restaurants.php?id_quartier=';
  echo $ligne['id'];
  echo '">';
  echo $ligne['nom'];
  echo '</a>';
  echo '</li>';

}

?>

</ul>

<?php include("pieddepage.php"); ?>

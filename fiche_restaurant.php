<?php include("entete.php"); ?>

<p class="lead">

<?php

$id = $_REQUEST['id'];

$requete = $base->prepare("
select
 quartier.nom as nom_quartier,
 restaurant.nom,
 restaurant.adresse,
 restaurant.description

 from restaurant
  join quartier on id_quartier = quartier.id

 where restaurant.id=:id
");

$requete->bindValue(':id', $id);

$requete->execute();

$ligne = $requete->fetch();

echo '<h2>';
echo $ligne['nom'];
echo '<small>';
echo ' (quartier ';
echo $ligne['nom_quartier'];
echo ')';
echo '</small>';
echo '</h2>';

echo '<address>';
echo $ligne['adresse'];
echo '</address>';

echo '<p>';
echo $ligne['description'];
echo '</p>';

?>
	<div>
	<!--bouton Supprimer-->
	<label for="submit"></label>
	<input type="submit" name="text" value="Supprimer">
	</div>


<?php include("pieddepage.php"); ?>

	<?php 
		include("entete.php");
		include('base.inc.php');
		?>
	<h3>Modifier un restaurant</h3>
<ul>

<?php
	$nom= $_REQUEST['nom'];
	$description=$_REQUEST['description'];
	$requete = $base->prepare('
		UPDATE restaurant
	 		SET nom = :nom,
	 			description = :description
	 		WHERE id = :id
	 	');
	$requete->bindValue(":nom", $_REQUEST['nom']);
	$requete->bindValue(":description", $_REQUEST['description']);
	$requete->bindValue(":id", $_REQUEST['id']);
	$requete->execute();

	?>
	<li>Nom du restaurant : <?php echo $nom; ?></li>
	<li>Description du restaurant : <?php echo $description;?></li>
</ul>
<?php include("pieddepage.php"); ?>

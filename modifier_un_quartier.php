	<?php 
		include("entete.php");
		include('base.inc.php');
		?>
	<h3>Modifier un quartier</h3>
	
	<ul>

	<?php

	$nom= $_REQUEST['nom'];
	$description=$_REQUEST['description'];
	$requete = $base->prepare(
		'UPDATE quartier 
		    SET nom = :nom, 
		    		description= :description
		    	WHERE id = :id
		');
	$requete-> bindValue(":nom", $_REQUEST['nom']);
	$requete-> bindValue(":description", $_REQUEST['description']);
	$requete-> bindValue(":id", $_REQUEST['id']);
	$requete->execute();
	?>
		<li>Nom du quartier : <?php echo $nom; ?></li>
		<li>Description du quartier : <?php echo $description;?></li>

	</ul>

	<?php include("pieddepage.php"); ?>

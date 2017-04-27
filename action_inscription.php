<?php
	include('entete.php');


	$noom='SELECT * FROM utilisateur WHERE nom';

	$nom=$_POST['nom'];
	$mdp=$_POST['mdp'];
			
				$sql='INSERT INTO utilisateur (nom,mdp) VALUES (:nom,:mdp)';
				$request = $base->prepare($sql);
				$request -> bindvalue(':nom',$nom);
				$request -> bindvalue(':mdp',$mdp);
				$request -> execute();

if ($nom=$noom) {
	echo 'nom deja utiliser'
}
?>


<p>Bonjour <?=$nom?>, vous êtes bien inscrit.<a href="connection.php">Continuer</a></p>
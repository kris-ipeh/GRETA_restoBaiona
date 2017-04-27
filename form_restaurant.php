	<?php 
		include("entete.php");
		include('base.inc.php');

		$id = $_REQUEST['id_restaurant'];
	$id_restaurant = $_REQUEST['id_restaurant'];

$requete = $base->prepare(
  "select nom AS nom_du_restaurant from restaurant where id=:id_restaurant"
);

$requete->bindValue(":id_restaurant", $id_restaurant);

$requete->execute();

$ligne = $requete->fetch();
		?>

			<form action="modifier_un_restaurant.php" >

		<fieldset id="Renseignez les champs suivants">
				<legend>Modifier un restaurant : <?php echo $ligne['nom_du_restaurant'];?></legend>

				<div class="reponseSimple">
					<label for="nom">Nom :</label>
					<input type="text" name="nom">
				</div>

				<div class="reponseSimple">
					<label for="description">Description :</label>
					<input type="text" name="description">
				</div>

					<input type="hidden" name="id" value="<?php echo $id ?>">

		</fieldset>
	
			<input type="submit" value="Validez"></input>
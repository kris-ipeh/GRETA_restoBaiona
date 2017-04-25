		<?php 
		include("entete.php");
		include('base.inc.php');
		?>
<?php

$id_quartier = $_REQUEST['id_quartier'];

$requete = $base->prepare(
  "select nom AS nom_du_quartier from quartier where id=:id_quartier"
);

$requete->bindValue(":id_quartier", $id_quartier);

$requete->execute();

$ligne = $requete->fetch();

?>

			<form action="modifier_un_quartier.php">

		<fieldset id="Renseignez les champs suivants">
				<legend>Modifier un quartier : <?php echo $ligne['nom_du_quartier'];?></legend>

				<div class="reponseSimple">
					<label for="nom">Nom :</label>
					<input type="text" name="nom">
				</div>

				<div class="reponseSimple">
					<label for="description">Description :</label>
					<input type="text" name="description">
				</div>

					<input type="hidden" name="id" value="<?php echo $id_quartier ?>">


		</fieldset>
	
			<input type="submit" value="Validez"></input>
			

		</form>

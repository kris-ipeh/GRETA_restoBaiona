<?php 

	include('entete.php'); ?>

	<p class="lead"></p><br /><br />

	<h2> Ajoutez un restaurant : <br /><br /></h2>

	<form action="creer_nouveau_restaurant.php">
		<label>Entrez le nom du restaurant :</label>
		<input type="text" name="nom">
		<br /><br />
		<label>Entrez l'adresse du restaurant :</label>
		<input type="text" name="adresse">
		<br /><br />
		<label>Entrez la description du restaurant :</label>
		<input type="text" name="description">
		<br /><br />
		<label>Quartier :</label>
			<select name="id_quartier">
			<?php 
	  			$sql = 'SELECT * FROM quartier';
				$request = $base->query($sql);
				while ($donnees = $request->fetch()) {
			?> 
					<option  value="<?php echo $donnees['id'] ?>">
						<?php
							print $donnees['nom'];
						?> 
					</option>
			<?php } ?>
			
		<input type="submit" name="submit">
		<a href="ajouter_un_quartier.php">Créer un nouveau quartier</a>
	</form>

	<?php include("pieddepage.php"); ?>


	<?php 
		include('entete.php');
	?>
	<h1>Modifier un quartier</h1>
	<form action="modifier_un_quartier_form.php">
		
		<div class="quartier">
			<label for="quartier">Choisissez un quartier</label>
				<select name="id_quartier" id="id_quartier">
					<?php $sql='SELECT id,nom FROM quartier';
					$request = $base ->query($sql);
					while($data = $request->fetch()) { ?>
						<option value="<?php echo $data['id']; ?>">
							<?php echo $data['nom']; ?>
						</option>
					<?php }?>
				</select>
		
		</div>
		</br>

		<input type="submit" name="envoyer">
	</form>
<?php include("pieddepage.php"); ?>
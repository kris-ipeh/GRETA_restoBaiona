	<?php 
		include('entete.php');
	?>
	<h1>Modifier un restaurant</h1>
	<form action="form_restaurant.php" >
		
		<div class="restaurant">
			<label for="restaurant">MODIFIER LE restaurant</label>
				<select name="id_restaurant" id="id_restaurant">
					<?php $sql='SELECT id,nom FROM restaurant';
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
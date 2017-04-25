<?php include('entete.php'); ?>


<form action="update_cuisinier_post.php" method="post">
  <fieldset id="modifier_cuisinier">
  <legend>Modifier les informations d'un cuisinier</legend>

    <div>
      <label for="nom_cuisinier">Nom du cuisinier :</label>
      <input type="text" name="nom_cuisinier" id="nom_cuisinier">
    </div>

    <div>
      <label for="salaire">salaire :</label>
      <input type="number" name="salaire" id="salaire" value="" />
    </div>
<?php
$sql = 'SELECT restaurant.nom AS restaurant FROM restaurant';
$request = $base->prepare($sql);
$request->execute();
?>
    <div>
      <label for="restaurant_cuisinier">Restaurant du cuisinier :</label>
      <select id="restaurant_cuisinier">
        <?php
          while($ligne = $request->fetch()){ ?>
            <option>
            <?= $ligne['restaurant']; ?>
            </option>
        <?php } ?>
      </select>
    </div>
<?php
$sql = 'SELECT DISTINCT diplome.nom AS diplome FROM diplome';
$request = $base->prepare($sql);
$request->execute();
?>
    <div>
      <label for="diplome_cuisinier">Diplôme du cuisinier :</label>
      <select id="diplome_cuisinier">
        <?php
          while($ligne = $request->fetch()){ ?>
            <option>
            <?= $ligne['diplome']; ?>
            </option>
        <?php } ?>
      </select>
    </div>
    <div>
      <input type="submit" name="valider">
    </div>
  </fieldset>
</form>

<?php include('pieddepage.php'); ?>

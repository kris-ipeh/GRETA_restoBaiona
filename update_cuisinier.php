<?php
include('entete.php');

// on récupère et on stocke dans une variable l'id du cuisinier à modifier
$id = $_REQUEST['id']; ?>

<!-- formulaire -->
<form method="post">
  <fieldset id="modifier_cuisinier">
  <legend>Modifier les informations d'un cuisinier :
    <?php
//afficher le cuisinier à modifier
      $sql = 'SELECT * FROM cuisinier WHERE  id =:id';
      $request = $base->prepare($sql);
      $request->bindValue(":id", $id);
      $request->execute();
      while ($ligne = $request->fetch()) {
        echo '<strong>' . $ligne['nom'] . '<strong>';
    ?>
  </legend>
    <div>
      <label for="nom">Nom :</label>
      <input type="text" name="nom" id="nom" value="<?php echo($ligne['nom']); ?>" />
    </div>

    <div>
      <label for="salaire">salaire :</label>
      <input type="number" name="salaire" id="salaire"  value="<?php echo($ligne['salaire']); ?>"/>
    </div>
    <?php } ?>
    <div>
      <label for="restaurant_cuisinier">Restaurant :</label>
      <select id="restaurant_cuisinier" />
        <?php
//afficher la liste des restaurants
        $sql = 'SELECT restaurant.nom AS restaurant FROM restaurant';
        $request = $base->prepare($sql);
        $request->execute();
          while($ligne = $request->fetch()){ ?>
            <option>
            <?= $ligne['restaurant']; ?>
            </option>
        <?php } ?>
      </select>
    </div>

    <div>
      <label for="diplome_cuisinier">Diplôme :</label>
      <select id="diplome_cuisinier" />
        <?php
//afficher la liste des diplômes
        $sql = 'SELECT DISTINCT diplome.nom AS diplome FROM diplome';
        $request = $base->prepare($sql);
        $request->execute();
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

<?php
// on recupère les id des restaurants et des diplomes
$sql = 'SELECT
          cuisinier.id AS cuisinier_id,
          cuisinier.nom AS cuisinier,
          restaurant.id AS restaurant_id,
          restaurant.nom AS restaurant,
          diplome.id AS diplome_id,
          diplome.nom AS diplome
        FROM cuisinier
          JOIN diplome ON diplome.id = id_diplome
          JOIN restaurant ON restaurant.id = id_restaurant';
$request = $base ->prepare($sql);
$request->execute();
while($ligne = $request->fetch()) {
  $id_restaurant = $ligne['restaurant_id'];
  $id_diplome = $ligne['diplome_id'];
};

//on effectue les modifications dans la bdd
if(!empty($_POST)) {
  $request = $base->prepare(
        'UPDATE cuisinier
          SET nom = :nom,
              salaire = :salaire,
              id_restaurant = :id_restaurant,
              id_diplome = :id_diplome
          WHERE id = :id');

  $request->bindValue(':nom', $_REQUEST['nom']);
  $request->bindValue(':salaire', $_REQUEST['salaire']);
  $request->bindValue(':id_restaurant', $id_restaurant);
  $request->bindValue(':id_diplome', $id_diplome);
  $request->execute();
};

include('pieddepage.php'); ?>

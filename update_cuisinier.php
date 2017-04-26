<?php
include('entete.php');

// on récupère et on stocke dans une variable $id_cuisinier l' id du cuisinier à modifier
$id = $_REQUEST['id']; ?>


<form method="post">
  <fieldset id="modifier_cuisinier">
  <legend>Modifier les informations d'un cuisinier :
    <?php
//afficher le cuisinier à modifier
      $sql = 'SELECT * FROM cuisinier WHERE  id = :id';
      $request = $base->prepare($sql);
      $request->bindValue(":id", $id);
      $request->execute();
      while ($ligne = $request->fetch()) {
        echo '<strong>' . $ligne['nom'] . '<strong>';
    } ?>
  </legend>

    <div>
      <label for="nom_cuisinier">Nom :</label>
      <input type="text" name="nom_cuisinier" id="nom_cuisinier" />
    </div>

    <div>
      <label for="salaire">salaire :</label>
      <input type="number" name="salaire" id="salaire" value="" />
    </div>

    <div>
      <label for="restaurant_cuisinier">Restaurant du cuisinier :</label>
      <select id="restaurant_cuisinier">
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
      <label for="diplome_cuisinier">Diplôme du cuisinier :</label>
      <select id="diplome_cuisinier">
        <?php
//afficher la liste des diplômes
        $sql = 'SELECT DISTINCT diplome.nom AS diplome FROM diplome';
        $request = $base->prepare($sql);
        //$request->bindValue(":id-cuisinier", $id_cuisinier);
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

$requete = $base ->prepare($sql);
$requete->execute();
while($ligne = $requete->fetch()) {
  $id_restaurant = $ligne['restaurant_id'];
  $id_diplome = $ligne['diplome_id'];
};

/*
if(!empty($_POST)) {
  $sql = 'UPDATE cuisinier(nom, salaire, id_restaurant, id_diplome) VALUES(:nom, :salaire, :id_restaurant, :id_diplome) WHERE id=:id-cuisinier';
  $request->prepare($sql);
  $request->execute(array(
    'nom'           => $_POST['nom'],
    'salaire'       => $_POST['salaire'],
    'id_restaurant' => $id_restaurant,
    'id_diplome'    => $id_diplome
  ));
}
*/
include('pieddepage.php'); ?>

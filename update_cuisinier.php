<?php
include('entete.php');

// on récupère et on stocke dans une variable l'id du cuisinier à modifier
// l'id a été passé dans l'URL : "update_cuisinier.php?id=42" par exemple
$id = $_REQUEST['id']; ?>

<!-- formulaire -->
<form action="action_update_cuisinier.php">
  <!-- on transmet au fichier PHP de destination l'id du cuisinier -->
  <input type="hidden" name="id" value="<?php echo $id ?>">
  <fieldset id="modifier_cuisinier">
  <legend>Modifier les informations d'un cuisinier :
  </legend>
  <?php
      //afficher le cuisinier à modifier
      $sql = 'SELECT * FROM cuisinier WHERE id =:id';
      $request = $base->prepare($sql);
      $request->bindValue(":id", $id);
      $request->execute();
      $ligneCuisinier = $request->fetch();
      ?>
      <div>
        <label>Nom :
          <input name="nom"
                 value="<?php echo($ligneCuisinier['nom']); ?>" />
        </label>
      </div>
    
      <div>
        <label>salaire :
           <input type="number" name="salaire"
                  value="<?php echo($ligneCuisinier['salaire']); ?>"/>
        </label>
      </div>
      <div>
      <label>Restaurant :
       <select name="id_restaurant">
        <?php
        //afficher la liste des restaurants
        $sql = 'SELECT id, nom FROM restaurant';
        $request = $base->prepare($sql);
        $request->execute();
        while($ligneRestaurant = $request->fetch()){ ?>
            <option value="<?php echo $ligneRestaurant['id']; ?>"
            <?php
            if ($ligneRestaurant['id'] == $ligneCuisinier['id_restaurant']) {
               echo 'selected';
            }
            ?>
            >
             <?= $ligneRestaurant['nom']; ?>
           </option>
        <?php } ?>
       </select>
      </label>
    </div>

    <div>
     <label>Diplôme :
      <select name="id_diplome" />
        <?php
        //afficher la liste des diplômes
        $sql = 'SELECT id, nom FROM diplome';
        $request = $base->prepare($sql);
        $request->execute();
        while($ligneDiplome = $request->fetch()){ ?>
          <option value="<?php echo $ligneDiplome['id']; ?>"
          <?php
            if ($ligneDiplome['id'] == $ligneCuisinier['id_diplome']) {
               echo 'selected';
            }
          ?>
          >
            <?php echo $ligneDiplome['nom']; ?>
          </option>
        <?php } ?>
      </select>
     </label>
    </div>
    <div>
      <input type="submit" name="valider">
    </div>
  </fieldset>
</form>

<?php include('pieddepage.php'); ?>

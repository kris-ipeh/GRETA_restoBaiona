<?php include("entete.php"); ?>

<div id="container">
        <div class="supprimer-quartier"><h4>Vous voulez supprimer un quartier ?</h4></div>
        <form action="action_supprimer_un_quartier.php">
            <SELECT name="id_quartier" id="quartier">
                <?php $sql='SELECT id,nom FROM quartier';
                $request = $base->query($sql);
                while($data = $request->fetch()) { ?>
                <option value="<?php echo $data['id']; ?>">
                    <?php echo $data ['nom']; ?>
                </option>
                  <?php } ?>
            </SELECT>
        <br></br>
        <input type="image" name="suppression" src="img/delete.svg" style="width: 30px; height:30px;
    display:inline-block;" alt="Supprimer le quartier" OnClick="return confirm('Voulez-vous vraiment supprimer ?');">
    
</div>


<?php include("pieddepage.php"); ?>
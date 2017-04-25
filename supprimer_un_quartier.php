<?php include("entete.php"); ?>

<div id="container">
        <div class="supprimer-quartier"><h4>Vous voulez supprimer un quartier ?</h4></div>
        <form action="action_supprimer_un_quartier.php" method="POST">
            <SELECT name="quartier-supprimer" id="quartier-supprimer "size="1">
                <?php $sql='SELECT id,nom FROM quartier';
                $request = $base->query($sql);
                while($data = $request->fetch()) { ?>
                <option value="<?php echo $data['id']; ?>">
                    <?php echo $data ['nom']; ?>
                </option>
                  <?php } ?>
            </SELECT>
        <br></br>
        <input type="submit" name="supprimer-quartier" value="Valider">
</div>


<?php include("pieddepage.php"); ?>
<?php include("entete.php"); ?>

<div id="container">
        <div class="supprimer-quartier"><h4>Vous voulez supprimer un nouveau quartier ?</h4></div>
        <form action="supprimer_un_quartier.php" method="POST">
            <label for="nom">
                <input type="text" name="supprimer-quartier" id="supprimer-quartier" placeholder="indiquez son nom ici..." size="40" required="" autofocus=""></>
            </label>
        <br></br>
        <input type="submit" name="supprimer-quartier" value="Supprimer">
</div>


<?php include("pieddepage.php"); ?>
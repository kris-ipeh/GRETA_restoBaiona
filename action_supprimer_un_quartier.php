<?php include('entete.php'); ?>

<?php

	$id_quartier = $_REQUEST['id_quartier'];

    $requete = $base->prepare(
    "Delete from quartier where id=:id_quartier"
    );

    $requete->bindValue(":id_quartier", $id_quartier);

    $requete->execute();

?>

	
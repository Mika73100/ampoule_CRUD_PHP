<?php

require_once '../connexion.php';


$sql= "DELETE FROM users WHERE id=".$_GET['id'];

$prepare = $pdo->prepare($sql);
$prepare->execute();
$_SESSION['supprimer'] = TRUE;

?>
<html>
<?php
/* Ceci produira une erreur. Notez la sortie ci-dessus,
 * qui se trouve avant l'appel à la fonction header() */
header('Location: admin.php');
exit;
?>
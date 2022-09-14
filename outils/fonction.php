<?php



//sécurisation des données 
function valid_donnees($donnees){
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    $donnees = htmlspecialchars($donnees);
    $donnees = strip_tags($donnees);
    return $donnees;
}



?>
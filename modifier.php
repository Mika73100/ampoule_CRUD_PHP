<?php

//j'appel ma boite a outils avec le paramètre de filtre sécurité 
// + ma connexion
require_once './outils/connexion.php';
require_once'./outils/fonction.php';

//j'appel ma viariable POST pour modifier mon tableau.
if (isset($_POST['modifier'])){

    //je reprend la totalité de ma table avec les différents élément de mon formulaire.
    $id = $_GET['id'];
    $prix  = $_POST['prix'];
    $position  = $_POST['position'];
    $etage  = $_POST['etage'];
    $message  = $_POST['message'];
    
    //j'utilise la fonction UPDATE de mysql avec le nom de ma table et les différente caractéristique.
    $sql = "UPDATE exo SET prix= :prix, position= :position, message= :message, etage= :etage WHERE id= :id";
    $req = $pdo->prepare($sql);

    //je place un bindparam devant chaque requette ainsi 
    //qu'un systeme de filtre pour de la sécurité supplémentaire à l'injection de données.
        //on "accroche" les paramètres (id)
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->bindParam(':etage', $etage, PDO::PARAM_INT);
        $req->bindParam(':position', $position, PDO::PARAM_STR);
        $req->bindParam(':prix', $prix, PDO::PARAM_INT);
        $req->bindParam(':message', $message, PDO::PARAM_STR);
        //on exécute la requete
        $req->execute();
        
        //on fait une redirection.
        header("Location:affiche.php");
    }

?>

<?php

require'connexion.php';

if (isset($_POST['modifier'])){

    $id = $_GET['id'];
    $prix  = $_POST['prix'];
    $position  = $_POST['position'];
    $etage  =$_POST['etage'];
    $message  =$_POST['message'];
    
    $sql = "UPDATE exo SET prix= :prix, position= :position, message= :message, etage= :etage WHERE id= :id";
    $req = $pdo->prepare($sql);

        //on "accroche" les paramètres (id)
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->bindParam(':etage', $etage, PDO::PARAM_INT);
        $req->bindParam(':position', $position, PDO::PARAM_STR);
        $req->bindParam(':prix', $prix, PDO::PARAM_INT);
        $req->bindParam(':message', $message, PDO::PARAM_STR);
        //on exécute la requete
        $req->execute();
        
        header("Location:affiche.php");
    }

?>

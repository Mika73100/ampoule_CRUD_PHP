<?php

require_once'../connexion.php';
require_once'../outils/fonction.php';

if (isset($_POST['modifier'])){

    $id = $_GET['id'];
    $username = $_POST['username'];
    $mail  = $_POST['mail'];
    $portable  = $_POST['portable'];
    $prenom  =$_POST['prenom'];
    $nom  =$_POST['nom'];
    
    $sql = "UPDATE users SET username= :username, mail= :mail, portable= :portable, prenom= :prenom, nom= :nom WHERE id= :id";
    $req = $pdo->prepare($sql);

    error_log('je suis ici');
            //on "accroche" les paramètres (id)
            $req->bindParam(':username', $username, PDO::PARAM_STR);
            $req->bindParam(':mail', $mail, PDO::PARAM_STR);
            $req->bindParam(':portable', $portable, PDO::PARAM_STR);
            $req->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $req->bindParam(':nom', $mail, PDO::PARAM_STR);
            $req->bindParam(':id', $id , PDO::PARAM_INT);


        //on exécute la requete
        $req->execute();
        
        header("Location:admin.php");
    }

?>

<?php

require'../connexion.php';

//ici j'oblige l'admin a remplir les champs
//var_dump($_POST);
if(!empty($_POST["username"]) &&
!empty($_POST["mail"]) &&
!empty($_POST["portable"]) &&
!empty($_POST["prenom"]) &&
!empty($_POST["nom"]));

{
    $id = $_GET['id'];
    $username  = $_POST['username'];
    $mail  = $_POST['mail'];
    $portable  =$_POST['portable'];
    $prenom  =$_POST['prenom'];
    $nom  =$_POST['nom'];

    $sql = "UPDATE users SET username= :username, mail= :mail, portable= :portable, prenom= :prenom, nom= :nom  WHERE id=:id";
    $req = $pdo->prepare($sql);

        //on "accroche" les paramètres (id)
        $req->bindParam(':username', $username, PDO::PARAM_STR);
        $req->bindParam(':mail', $mail, PDO::PARAM_STR);
        $req->bindParam(':portable', $portable, PDO::PARAM_STR);
        $req->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $req->bindParam(':nom', $mail, PDO::PARAM_STR);
        $req->bindParam(':id', $id , PDO::PARAM_INT);
        //on exécute la requete
        $req->execute();

        header( "Location:admin.php" );
    }
?>

<?php

require_once 'connexion.php';
require_once './outils/fonction.php';


if (isset( $_POST['password'])){
$_POST['password']=password_hash($_POST['password'], PASSWORD_DEFAULT);

try{
    $prepare = $pdo->prepare("INSERT INTO users 
    (username,password) VALUES (:username, :password)");

    $prepare->bindParam(':username', $_POST['username'],PDO::PARAM_STR);
    $prepare->bindParam(':password', $_POST['password'],PDO::PARAM_STR);
    $prepare->execute();

    header('Location:affiche.php');

}catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
    }
}
    
?>
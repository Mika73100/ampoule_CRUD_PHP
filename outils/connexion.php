<?php
    session_start();
//je démarre une session pour utiliser la super globale $session


//je note ici la connexion au serveur
    $servername = "localhost";
    $dbname = "ampoule";
    $user = "root";
    $pass = "root";
    

//j'instencie PDO avec mysql ou je reprend les varialbles de serveur comme,
// name ainsi que la totalité de mes champs de connexion.
try{
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);}
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
    }
    
    
?>
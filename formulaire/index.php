<?php

require'../outils/connexion.php';
require_once'../outils/fonction.php';

unset($_SESSION['id']);
unset($_SESSION['username']);
error_log("Inscription".print_r($_SESSION, 1));

error_log(print_r($_POST,1));
if (isset($_POST["inscription"])){
if( !empty($username = valid_donnees($_POST['username'])) && 
    !empty($password = password_hash(valid_donnees($_POST['password']), PASSWORD_DEFAULT)) &&
    !empty( $mail = valid_donnees($_POST['mail'])) &&
    !empty($prenom = valid_donnees($_POST['prenom'])) &&
    !empty($nom = valid_donnees($_POST['nom'])) &&
    !empty($portable = valid_donnees($_POST['portable']))
    ){
        error_log($password);
    // print_r($_POST);
    $sql = "INSERT INTO users (username, password, mail, prenom, nom, portable) VALUES (:username,:password,:mail,:prenom,:nom,:portable)";

    $req = $pdo->prepare($sql);
    error_log($username);
        $req->bindParam(':username', $username, PDO::PARAM_STR);
        $req->bindParam(':password', $password, PDO::PARAM_STR);
        $req->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $req->bindParam(':nom' , $nom, PDO::PARAM_STR);
        $req->bindParam(':portable', $portable, PDO::PARAM_STR);
        $req->bindParam(':mail', $mail, PDO::PARAM_STR);
        $req->execute();
        
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $pdo->lastInsertId();

        header("Location: ../affiche.php");
    }
}
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../ampoule/img/logo-favicon.png" />
    <link rel="stylesheet" href="inscription.css">

    <title>Inscription</title>
</head>


<body>
    <div class="box-login">
        
                                <h2>Inscrivez-vous</h2>
        <form method="POST">
            <div class="form-groupe">
                <label for="utilisateur">Nom d'utilisateur</label>
                <input type="text" name="username" id="utilisateur" placeholder="Nom d'utilisateur" maxlength="24">
                <img src="img/vert.png" alt="icone de verification" class="icone-verif">
                <span class="message-alerte">Choisissez un pseudo entre 3 et 24 caractères</span>
            </div>


            <div class="form-groupe">
                <label for="email">Entrez votre mail</label>
                <input type="email" valeur="mail" name="mail" id="email" placeholder="Votre mail">
                <img src="img/vert.png" alt="icone de verification" class="icone-verif">
                <span class="message-alerte">Rentrez un email valide.</span>
            </div>

            <div class="form-groupe">
                <label for="nom">Nom</label>
                <input type="text" valeur="nom" name="nom" placeholder="Votre nom">
                <span class="message-alerte">Rentrez votre nom</span>
            </div>

            <div class="form-groupe">
                <label for="utilisateur">Prénom</label>
                <input type="text" valeur="prenom" name="prenom" placeholder="Votre prénom">
                <span class="message-alerte">Rentrez votre prénom</span>
            </div>

            <div class="form-groupe">
                <label for="utilisateur">Portable</label>
                <input type="text" valeur="portable" name="portable" placeholder="Votre portable">
                <span class="message-alerte">Rentrez votre numéro de portable</span>
            </div>


            <div class="form-groupe">
                <label for="mdp">Mot de passe</label>
                <input type="password" valeur="password" name="password" id="mdp" placeholder="Mot de passe">
                <img src="img/vert.png" alt="icone de verification" class="icone-verif">
                <span class="message-alerte">Un symbole, une lettre minuscule, un chiffre.</span>
                <div class="ligne">
                    <div class="l1"><span>faible</span></div>
                    <div class="l2"><span>moyen</span></div>
                    <div class="l3"><span>fort</span></div>
                </div>
            </div>


            <div class="form-groupe">
                <label for="mdpconf">Confirmation du mot de passe</label>
                <input type="password" name="password" id="mdpconf" placeholder="Confirmez">
                <img src="img/vert.png" alt="icone de verification" class="icone-verif">
            </div>


            <button type="submit" name="inscription" value="valeur"  class="btn btn-primary mt-2">Inscription</button>


        </form>
    </div>

    <script src="app.js"></script>
</body>
</html>


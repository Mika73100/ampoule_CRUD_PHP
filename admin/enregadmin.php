<?php

//Connexion 
require_once 'connexion.php';
require_once '../outils/fonction.php';



if(!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["mail"]) &&filter_var(valid_donnees($_POST['mail'],FILTER_VALIDATE_EMAIL))) {

    
    $password = valid_donnees($_POST['password']);
    $username = valid_donnees($_POST['username']);
    $mail = valid_donnees($_POST['mail']); 

    $sth = $pdo->prepare("SELECT id, username, password, mail FROM admin WHERE username= '$username'");
    
    $sth->bindParam(':username', $_POST['username'],PDO::PARAM_STR);
    $sth->bindParam(':password', $_POST['password'],PDO::PARAM_STR);
    $sth->bindParam(':mail', $_POST['mail'],PDO::PARAM_STR);
    $sth->bindParam(':users_id', $_SESSION['id'],PDO::PARAM_INT);
    $sth->execute();
    $resulte = $sth->fetch();


    if (password_verify($password, $resulte['password'])) {
        echo 'Le mot de passe est valide !';
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['mail'] = $_POST['mail'];
    $_SESSION['id'] = $resulte['id'];
        header('Location:affiche.php');
    } else {
        echo 'Le mot de passe est invalide.';
    } 
} 
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../formulaire/style.css">
    <title>Formulaire d'inscription admin</title>
</head>

<body>
<script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>



<div class="box-login">
    <div class="container">
        <form  method="post">
            <div class="form-group">
                <label for="username" class="form-label">Identifiant</label>
                <input type="text" maxlength="20" class="form-control" name="username" id="username" placeholder="Entrer votre identifiant" required>
            </div>

            <div class="form-group">
                <label for="password" class="form-control">Password</label>
                <input type="password" onclick="revel()" maxlength="20" class="form-control" name="password" id="password" placeholder="Entrer le mot de passe" required >     
                <input type="checkbox" id="scales" name="scales"checked>
            </div>


            <button type="submit" action="" name="submit" class="btn btn-primary mt-2">connexion</button>
            
            <button class="btn btn-primary mt-2" onclick="window.location.href = './formulaire/index.php';">Inscription</button>

            <button class="btn btn-primary" onclick="window.location.href = './formulaire/index.php';">Admin</button> 


            <script> function revel() {
                const oeil = document.getElementsById("password").style
                oeil.type='text'
            }</script>
    </div>
    </form>
</div>

</body>
</html>
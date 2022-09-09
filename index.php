<?php
// Connexion 
require_once 'connexion.php';

//securité
require_once 'outils/fonction.php';

//ici je me deconnecte
if (isset($_GET['deco'])){
    unset($_SESSION['usernameadmin']);
    unset($_SESSION['id']);
    unset($_SESSION['username']);
}

if (!empty($_POST["username"]) && !empty($_POST["password"])) {

    $password = valid_donnees($_POST['password']);
    $username = valid_donnees($_POST['username']);

    $sth = $pdo->prepare("SELECT usernameadmin, passwordadmin, id FROM admin WHERE usernameadmin= '$username'");
    $sth->execute();
    $resulte = $sth->fetch();

    

    if (password_verify($password, $resulte['passwordadmin'])) {
        echo 'Le mot de passe est valide !';

        if ($sth->rowCount() > 0) {
            error_log('super admin');
            $_SESSION['usernameadmin'] = $username;
            $_SESSION['id'] = $resulte['id'];
            header('Location:admin/admin.php');
        }
    } else {
        error_log("utilisateurs simple");
        $sth = $pdo->prepare("SELECT username, password, id FROM users WHERE username= '$username'");
        $sth->execute();
        $resulte = $sth->fetch();

        if (password_verify($password, $resulte['password'])) {
            echo 'Le mot de passe est valide !';

            if ($sth->rowCount() > 0) {
                error_log('utilisateur normal');
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $resulte['id'];
                header('Location:affiche.php');
            }
        }
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
    <title>Formulaire d'inscription'</title>
</head>

<body>
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>



    <div class="box-login">
        <div class="container">
            <form method="post">
                <div class="form-group">
                    <img src='./img/logo.png'>
                    <label for="username" class="form-label">Identifiant</label>
                    <input type="text" maxlength="20" class="form-control" name="username" id="username" placeholder="Entrer votre identifiant" required>
                </div>

                <div class="form-group">
                    <label for="password" class="form-control">Password</label>
                    <input type="password" maxlength="20" class="form-control" name="password" id="password" placeholder="Entrer le mot de passe" required>
                </div>



                <button type="submit" action="" name="submit" class="btn btn-primary mt-2">connexion</button>

                <button class="btn btn-primary mt-2" onclick="window.location.href = './formulaire/index.php';">Inscription</button>

        </div>
        </form>
    </div>

</body>

</html>
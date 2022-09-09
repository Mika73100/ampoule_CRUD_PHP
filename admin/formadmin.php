<?php

//je recupère la connexion
require_once '../connexion.php';


$id=$_GET['id'];
$prepare = $pdo->prepare("SELECT * FROM users WHERE id=$id");
$prepare->execute();
$users = $prepare->fetch();


error_log('debut de la condition');

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/style.css">

    <title>Localisation d'intervention</title>
</head>

<body>
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <main class="container">
            <section class="col-12">
                <h1>Fiche contact</h1>
                <form action="modifier.php?id=<?=$users['id']?>" method="post">

                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input class="form-control" value="<?=$users['username']?>" name="username" placeholder="Username">
                        </input>
                    </div>

                    <div class="form-group">
                        <label for="nom">Nom:</label>
                        <input class="form-control" value="<?=$users['nom']?>" name="nom" placeholder="Nom">
                        </input>
                    </div>

                    <div class="form-group">
                        <label for="prenom">Prenom:</label>
                        <input class="form-control" value="<?=$users['prenom']?>" name="prenom" placeholder="Prenom">
                        </input>
                    </div>

                    <div class="form-group">
                        <label for="portable">Portable:</label>
                        <input class="form-control" value="<?=$users['portable']?>" name="portable" placeholder="Portable">
                        </input>
                    </div>

                    <div class="form-group">
                        <label for="mail">Adresse Email:</label>
                        <input type="mail" max="30" value="<?=$users['mail']?>" class="form-control" name="mail" placeholder="email">
                        </input>
                    </div><br>

                    <button class="btn btn-primary"><a href="admin.php">Retour</a></button>   

                    <a href="modifier.php?id=<?= $users['id'] ?>"><button type="submit" class="btn btn-warning" name="modifier" onclick="return confirm('Voulez-vous modifier ?')">Modifier</button></a>
                </form>
        </section>
    </main>
</body>
</html>
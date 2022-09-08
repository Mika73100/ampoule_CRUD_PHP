<?php

//je recupère la connexion
require_once '../connexion.php';

if (!empty($_POST["username"]) && !empty($_POST["mail"]) && !empty($_POST["portable"]) 
&& !empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["id"])

) {

    $id  = $_POST['id'];
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

        $id = $_POST['id'];
        $prepare = $pdo->prepare("SELECT id, username, mail, portable, nom, prenom From users WHERE Id= " . $_POST['id']);
        $prepare->execute();
        $resultat = $prepare->fetch();

    }
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/style.css">

    <title>Localisation d'intervention</title>
</head>

<body>
    <main class="container">
        <?php
        foreach ($resultat as $users) {
        ?>
            <section class="col-12">
                <h1>Fiche contact</h1>
                <form action="modifier.php?id=<?php echo $users['id'] ?>" method="post">

                <input type="hidden" value="<?= $users['id']?>" name="id">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input class="form-control" value="<?= $users['username'] ?>" name="username" placeholder="Username">
                        </input>
                    </div>

                    <div class="form-group">
                        <label for="nom">Nom:</label>
                        <input class="form-control" value=" <?= $users['nom'] ?>" name="nom" placeholder="Nom">
                        </input>
                    </div>

                    <div class="form-group">
                        <label for="prenom">Prenom:</label>
                        <input class="form-control" value="<?= $users['prenom'] ?>" name="prenom" placeholder="Prenom">
                        </input>
                    </div>

                    <div class="form-group">
                        <label for="prenom">Portable:</label>
                        <input class="form-control" value=" <?= $users['portable'] ?>" name="portable" placeholder="Portable">
                        </input>
                    </div>

                    <div class="form-group">
                        <label for="etage">Adresse Email:</label>
                        <input type="mail" max="30" value="<?php echo $users['mail'] ?>" class="form-control" name="mail" placeholder="email">
                    </div>
                    
                    <button type="submit" class="btn btn-warning"><a href="modifier.php">Modifier</a></button>

                    <button class="btn btn-primary"><a href="admin.php">Détails</a></button>    
                </form>
                
            <?php } ?>
            </section>
    </main>


    <?php
    if (isset($_SESSION['modifier']) && $_SESSION['modifier'] == true) { ?>
        <script type="text/javascript">
            $(function() {
                toastr.success(' <b>Changement modifier !</b>', 'Modifier', {
                    positionClass: "toast-top-full-width",
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "3000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                });
            });
        </script>
    <?php }
    $_SESSION['modifier'] = false;
    ?>
    



</body>
</html>
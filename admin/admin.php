<?php

require '../connexion.php';

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <title>Dashbord</title>
</head>

<body>
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <main><br>&nbsp;
    <a href="../index.php?deco=out"><button class="btn btn-danger">Déconnexion</button></a>
        <div class="row">
            <section class="col-12">
                <table class="table">
                    <br>
                    <thead>
                        <th></th>
                        <th>Username</th>
                        <th>Mail</th>
                        <th>Portable</th>
                        <th>Nom</th>
                        <th>Prenom</th>

                        <th><a href="../affiche.php"><button class="btn btn-success">Dashboard</button></a>

                        
                    
                    </th>
                    </thead>
                <tbody>

                        <?php
                    $prepare =$pdo->prepare("SELECT id, username, mail, portable, nom, prenom  FROM users");
                    $prepare->execute();
                    $result = $prepare->fetchAll();
                    //print_r($result);
                        $compteur = 1;
                        foreach($result as $users) {
                        
                        ?>
                            <tr>
                                <td><?= $compteur ?></td>
                                <td><?= $users['username'] ?><br></td>
                                <td><?= $users['mail'] ?><br></td>
                                <td><?= $users['portable'] ?><br></td>
                                <td><?= $users['nom'] ?><br></td>  
                                <td><?= $users['prenom'] ?><br></td>                  
                                <td>
                                    <a href="formadmin.php?id=<?= $users['id'] ?>"><button class="btn btn-primary">Détails</button></a>

                                    <button type="submit" class="btn btn-danger"><a href="supprimer.php?id=<?=$users['id']?>">Supprimer</a></button>

                                </tr>
                            <?php $compteur++;} ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </main>
    </body>
</html>
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
    <main>
        <div class="row">
            <section class="col-12">
                <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Mail</th>
                        <th>Portable</th>
                        <th>Nom</th>
                        <th>Prenom</th>

                        <th><a href="../affiche.php"><button class="btn btn-success">Dashbord</button></a></th>
                    </thead>
                <tbody>


                        
                        <?php
                    $prepare =$pdo->prepare("SELECT id, username, mail, portable, nom, prenom  FROM users");
                    $prepare->execute();
                    $result = $prepare->fetchAll();
                    //print_r($result);
                        foreach($result as $users) {
                        
                        ?>
                            <tr>
                                <td><?= $users['id'] ?><br></td>
                                <td><?= $users['username'] ?><br></td>
                                <td><?= $users['mail'] ?><br></td>
                                <td><?= $users['portable'] ?><br></td>
                                <td><?= $users['nom'] ?><br></td>  
                                <td><?= $users['prenom'] ?><br></td>                  
                                <td>
                                    <a href="formadmin.php?id=<?= $users['id'] ?>"><button class="btn btn-primary">Détails</button></a>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </section>
            </div>
        </main>
    </body>
</html>
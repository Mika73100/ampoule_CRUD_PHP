<?php


require_once './outils/connexion.php';
require_once'./outils/fonction.php';

$prepare = $pdo->prepare("SELECT *, users.username FROM exo JOIN users ON exo.users_id = users.id
WHERE users_id = ".$_SESSION['id']);

//error_log(print_r($_SESSION, 1));
//error_log("SELECT * FROM exo WHERE users_id = ".$_SESSION['id']);

$prepare->execute();
$exos = $prepare->fetchAll();
//error_log(print_r($exos, 1));
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="icon" href="../ampoule/img/logo-favicon.png" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
        
        <title>Dashbord utilisateurs</title>
    </head>

    <body>
        <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        <main><br>&nbsp;
        
        <a href="index.php?deco=out"><button class="btn btn-danger">Déconnexion</button></a>

        <h1>Dashbord utilisateurs</h1>
    
        <section class="col-12">
            <table class="table">
        
        <br>
            <thead>
                    <th scope="col">N°</th>
                    <th scope="col">Date</th>
                    <th scope="col">Etage</th>
                    <th scope="col">Position</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Users</th>
                    <th><a href="liste.php"><button class="btn btn-success" >Ajouter</button></a>&nbsp;
                    <?php
                    //error_log(print_r($_SESSION));
                    if (isset($_SESSION['usernameadmin'])){
                    echo '<a href="admin/admin.php"><button class="btn btn-info" >Admin</button ></a>&nbsp;';}?></th>
            </thead>
        
                    <?php $compteur = 1;
                    error_log(print_r($exos,1));
                            foreach ($exos as $exo) {  ?>
                            
                    <tr>
                        <td><?= $compteur ?></td>
                        <td><?= $exo['date'] ?><br></td>
                        <td><?= $exo['etage'] ?><br></td>
                        <td><?= $exo['position'] ?><br></td>
                        <td><?= $exo['prix'] ?></td>
                        <td><?= $exo['username']?></td>                  
                        <td>
                            <a href="details.php?id=<?= $exo['id'] ?>"><button class="btn btn-primary">Détails</button></a><br><br>

                            <a class="btn btn-danger" type="submit" href="supprimer.php?id=<?=$users['id']?>" role="button">Supprimer</a>
                        </td>
                        <!-- ici j'incrémante ma colonne numéro -->
                        <?php $compteur++;} ?>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>

    <?php
    if (isset($_SESSION['supprimer']) && $_SESSION['supprimer'] == true) { ?>
        <script type="text/javascript">
            $(function() {
                toastr.success(' <b>Changement supprimé !</b>', 'Supprimer', {
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
    $_SESSION['supprimer'] = false;
    ?>
    
    </body>
</html>
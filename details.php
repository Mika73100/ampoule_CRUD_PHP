<?php

require_once './outils/connexion.php';
require_once'./outils/fonction.php';

define("NOMBREETAGE",50);

$id=$_GET['id'];
//$prepare = $pdo->prepare("SELECT *, users.username FROM exo JOIN users ON exo.users_id = users.id
//WHERE users_id = ".$_SESSION['id']);
$prepare = $pdo->prepare("SELECT * FROM exo WHERE users_id=$id");
$prepare->execute();
$exo = $prepare->fetch();

//error_log("detail -> SELECT * FROM exo WHERE users_id=$id");
//error_log("detail -> ".print_r($exo, 1));

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="icon" href="../ampoule/img/logo-favicon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="public\css\style.css">
    <title>Localisation d'intervention</title>
</head>

<body>
    <main class="container">

            <section class="col-12">
                <h1>Fiche technique</h1><br>
                
            <form action="modifier.php?id=<?php echo $exo['id']?>" method="post">
                <div class="form-group">
                    <label for="date">date: <?php echo $exo['date'] ?> </label>
                </div><br>

                <div class="form-group">
                    <label for="position">Default Position: </label>
                    <select  value="position" class="form-control" name="position" placeholder="Position">
                    <option value="droit">Droite</option>
                    <option value="aufond">Au fond</option>
                    <option value="gauche">Gauche</option>
                    </select>
                </div><br>

            <div class="form-group">
                <label for="etage">Selection de l'étage</label>
                <select name="etage">
                    <?php for ($i=1; $i <NOMBREETAGE ; $i++) { 
                        echo "<option value=$i>$i</option>";
                    } 
                    // <option value="1">1</option>
                    // <option value="2">2</option>
                    // <option value="3">3</option>
                    // <option value="4">4</option>
                    // <option value="5">5</option>
                    // <option value="6">6</option>
                    // <option value="7">7</option>
                    // <option value="8">8</option>
                    // <option value="9">9</option>
                    // <option value="10">10</option>
                    // <option value="11">11</option>
                    ?>
                </select>
            </div><br>

                <div class="form-group">
                    <label for="prix">Default Prix:</label>
                    <input type="number" value="<?php echo $exo['prix'] ?>"  class="form-control" name="prix" placeholder="Prix">
                </div><br>
                
                <div class="form-group">
                    <label for="message">Message:</label>
                    <input type="text" value="<?php echo $exo['message'] ?>"  class="form-control" name="message" placeholder="Message">
                </div><br>
                
                <a class="btn btn-primary" href="affiche.php" type="submit">Retour</a>

                <a href="modifier.php?id=<?= $exo['id'] ?>"><button type="submit" class="btn btn-warning" name="modifier" onclick="return confirm('Voulez-vous modifier ?')">Modifier</button></a>
            
                <a class="btn btn-success" href="pdf-content.php?id=<?=$id?>" role="button">PDF</a>
                
                </div>
            </form>
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
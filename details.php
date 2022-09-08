<?php

require_once 'connexion.php';


$id=$_GET['id'];
$prepare = $pdo->prepare("SELECT * FROM exo WHERE id=$id");
$prepare->execute();
$resultat = $prepare->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="public\css\style.css">
    <title>Localisation d'intervention</title>
</head>

<body>
    <main class="container">
            <?php
            foreach ($resultat as $exo) {
                ?>
            <section class="col-12">
                <h1>Fiche technique</h1><br>
                
            <form action="modifier.php?id=<?php echo $exo['id']?>" method="post">
                <div class="form-group">
                    <label for="date">date: <?= $exo['date'] ?> </label>
                </div><br>


                <div class="form-group">
                    <label for="position">Default Position: </label>
                    <select  value="position" class="form-control" name="position" placeholder="Position">
                    <option value="droit">Droit</option>
                    <option value="aufond">Au fond</option>
                    <option value="gauche">Gauche</option>
                    </select>
                </div><br>

            <div class="form-group">
                <label for="etage">Selection de l'étage</label>
                <select name="etage">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
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

                <a href="modifier.php?id=<?= $exo['id'] ?>"><button type="submit" class="btn btn-warning" name="modifier" onclick="return confirm('Voulez-vous modifier ?')">Modifier</button></a>
            
                <a href="affiche.php"><button type="submit" class="btn btn-info" name="modifier">Retour</button></a>

                <a href="pdf-content.php?id=<?=$id?>"><button type="button" class="btn btn-info" name="modifier">PDF</button></a>
                
        
                </div>
                </form>
            <?php }?>
            
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
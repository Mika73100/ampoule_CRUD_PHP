<?php

require 'connexion.php';

//print_r("rrr". $_SESSION['id']);
if (isset($_POST['ajouter'])) {
    try {
        
        $now = date("d/m/Y H:i:s", time());
        $sql = "INSERT INTO exo (date,etage,prix,position,users_id) VALUES ('$now',:etage,:prix,:position,:users_id)";

        $prepare = $pdo->prepare($sql);
        $prepare->bindParam(':etage', $_POST['etage'],PDO::PARAM_STR);
        $prepare->bindParam(':prix', $_POST['prix'],PDO::PARAM_INT);
        $prepare->bindParam(':position', $_POST['position'],PDO::PARAM_STR);
        $prepare->bindParam(':users_id', $_SESSION['id'],PDO::PARAM_INT);
        $prepare->execute();

        header('Location:affiche.php');
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/style.css">
    <title>Formulaire intervention</title>
</head>

<body>
    <div class="container">
        
        
        <form action="liste.php" method="post">
        

            <div class="form-group">
                <label for="select">Selection de l'étage</label>
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
                <label for="select">Sélection de l'espace</label>
                <select name="position">
                    <option value="droite">Droite</option>
                    <option value="fond">Au fond</option>
                    <option value="gauche">Gauche</option>
                </select>
            </div><br>

            <div class="form-group">
                <label for="prix">Prix</label>
                <input type="number" class="form-control" name="prix" placeholder="Prix">
            </div><br>
            
            
            <div class="form-group">
            <button name="ajouter" type="ajouter" action="liste.php" class="btn btn-success">Ajouter</button>
            
            <a class="btn btn-info" href="affiche.php" role="button">Dashbord</a>
            </div>
            
</form>
</body>
</html>

<?php
require_once 'connexion.php';


$id=$_GET['id'];
$prepare = $pdo->prepare("SELECT date, etage, prix, position, message, users_id FROM exo WHERE id=$id");
$prepare->execute();
$resultat = $prepare->fetchAll();

require_once 'genpdf.php';
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/style.css">
    <title>PDF</title>
</head>
<body>
    <h1>Liste de l'intervention technique</h1>
    <table>
        <thead>
            <th>Nom</th>
            <th>Phone</th>
            <th>Date</th>
            <th>Etage</th>
            <th>Position</th>
            <th>Message</th>
        </thead>
        <tbody>
        
                <?php foreach($resultat as $exo): ?>
                <?php 
                $phone = (!(isset($phone)))?'0000':$phone?>
                
                <tr>
                    <td><?= $_SESSION['username'] ?></td>
                    <td><?= $phone ?></td>
                    <td><?= $exo['date'] ?></td>
                    <td><?= $exo['etage'] ?></td>
                    <td><?= $exo['position'] ?></td>
                    <td><?= $exo['message'] ?></td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
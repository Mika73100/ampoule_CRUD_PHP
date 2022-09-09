
<?php

require_once 'connexion.php';
require_once 'genpdf.php';

$id=$_GET['id'];
$username=$_SESSION['username'];
$prepare = $pdo->prepare("SELECT * FROM exo WHERE id=$id");
$prepare->execute();
$resultat = $prepare->fetchAll();
extract($resultat[0]);


$prepare2 =$pdo->prepare("SELECT * FROM users WHERE username LIKE '%$username%'");
$prepare2->execute();
$resultat2= $prepare2->fetch();
extract($resultat2);



$message= (isset($message))? $message:'';


$html="
        <body>
        <img src='./img/logo.png' width='150' height='150'>
            <h1>Information de l'intervention</h1>
            <ul>
                <li>Date : $date</li>
                <li>NOM : $username</li>
                <li>Etage : $etage</li>
                <li>Position : $position</li>
                <li>Prix : $prix</li>
                <li>Message : $message</li>
            </ul>
        </body>";



require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf([
    "displayDefaultOriantation"=>'L',
    "tmpDir"=> __DIR__  . "pdf/"]);
$filename= "intervention".$id;
$mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output("pdf/".$filename.".pdf");
if (is_file('pdf/'.$file.'.pdf')) {
    unlink('pdf/'.$file.'.pdf');
}
header( "Location:pdf/$filename.pdf");









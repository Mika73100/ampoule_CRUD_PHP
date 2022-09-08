
<?php
require_once 'connexion.php';
require_once 'genpdf.php';

$id=$_GET['id'];
$username=$_SESSION['username'];
$prepare = $pdo->prepare("SELECT * FROM exo WHERE id=$id");
$prepare->execute();
$resultat = $prepare->fetchAll();
extract($resultat[0]);


$prepare2 =$pdo->prepare("SELECT mail FROM users WHERE username LIKE '%$username%'");
$prepare2->execute();
$resultat2= $prepare2->fetch();
extract($resultat2);

$html="<body>
    <h1>Liste de l'intervention technique</h1>
    <table>
        <thead>
            <th>Nom</th>
            <th>Date</th>
            <th>Etage</th>
            <th>Position</th>
            <th>Message</th>
        </thead>
        <tbody>
                <tr><td>$username</td></tr>
                <tr><td>$date</td></tr>
                <tr>><td>$etage</td></tr>
                <tr><td>$position</td></tr>
                <tr><td>$message</td></tr>
                
        </tbody>
    </table>
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
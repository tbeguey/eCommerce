<?php
    /*session_start();
    if (isset($_SESSION["NOM_USER"])) 
    {
    echo "Bonjour ".$_SESSION["NOM_USER"];
    }
    else
    {
    header("Location: connexion.php");
    }*/

$i = 1;
$driver = 'sqlsrv';
$host = 'INFO-SIMPLET';
$nomDb = 'Classique_Web';
$user = 'ETD';
$password = 'ETD';
// Chaîne de connexion
$pdodsn = "$driver:Server=$host;Database=$nomDb";
// Connexion PDO
$pdo = new PDO($pdodsn, $user, $password);
$request = "Select DISTINCT Titre_Album, Album.Code_Album, Enregistrement.Code_Morceau from Enregistrement
            join Composition_Disque on Composition_Disque.Code_Morceau = Enregistrement.Code_Morceau
            join Disque on Disque.Code_Disque = Composition_Disque.Code_Disque
            join Album on Disque.Code_Album = Album.Code_Album
            Where Album.Code_Album=" . $_GET['Code'];
foreach ($pdo->query($request) as $row) {
    echo "<a href='enregistrement.php?Code=" . $row['Code_Morceau'] . "'>";
    echo $row[utf8_decode('Titre_Album')];
    echo "<img src='imageAlbum.php?Code=" . $row['Code_Album'] . "'/>";
    echo "</a> <br>";
    $i++;
}
if ($i == 1) {
    echo "Pas D'albums";
}
$pdo = null;
?>

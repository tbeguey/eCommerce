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
$request = "Select DISTINCT Oeuvre.Titre_Oeuvre, Oeuvre.Code_Oeuvre, Album.Code_Album From Oeuvre
            join Disque on Album.Code_Album = Disque.Code_Album
            join Composition_Disque on Composition_Disque.Code_Disque = Disque.Code_Disque
            join Enregistrement on Enregistrement.Code_Morceau = Composition_Disque.Code_Morceau
            join Composition on Composition.Code_Composition = Enregistrement.Code_Composition
            join Composition_Oeuvre on Composition_Oeuvre.Code_Composition = Composition.Code_Composition
            join Oeuvre on Oeuvre.Code_Oeuvre = Composition_Oeuvre.Code_Oeuvre
            Where Oeuvre.Code_Oeuvre=" . $_GET['Code'];
foreach ($pdo->query($request) as $row) {
    echo "<a href='album.php?Code=" . $row['Code_Album'] . "'>";
    echo $row[utf8_decode('Titre_Oeuvre')];
    echo "<img src='imageAlbum.php?Code=" . $row['Code_Album'] . "'/>";
    echo "</a> <br>";
    $i++;
}
if ($i == 1) {
    echo "Pas D'oeuvres";
}
$pdo = null;
?>

<?php
$driver = 'sqlsrv';
$host = 'INFO-SIMPLET';
$nomDb = 'Classique_Web';
$user = 'ETD';
$password = 'ETD';
// Chaîne de connexion
$pdodsn = "$driver:Server=$host;Database=$nomDb";
// Connexion PDO
$pdo = new PDO($pdodsn, $user, $password);
$requestAbonnée = "Select Code_Abonné from Abonné where Nom_Abonné = " . 
$request = "Insert into Achat (Code_Enregistrement, Code_Abonné) VALUES(";
$pdo->exec($request);
foreach ($pdo->query($request) as $row) {
    echo "<a href='album.php?Code=" . $row['Code_Album'] . "'>";
    echo $row[utf8_decode('Titre_Oeuvre')];
    echo "<img src='imageAlbum.php?Code=" . $row['Code_Album'] . "'/>";
    echo "</a> <br>";
}
$pdo = null;
?>

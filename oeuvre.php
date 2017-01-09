<?php
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
$requete = "Select Oeuvre.Titre_Oeuvre, Oeuvre.Code_Oeuvre From Oeuvre
            Inner join Composer on Composer.Code_Oeuvre = Oeuvre.Code_Oeuvre
            Inner join Musicien on Musicien.Code_Musicien = Composer.Code_Musicien
            Where Musicien.Code_Musicien=" . $_GET['Code'];
echo " <h1> Oeuvre associée à ce compositeur : </h1> ";
foreach ($pdo->query($requete) as $row) {
    echo "<a href='enregistrement.php?Code=" . $row['Code_Oeuvre'] . "'/>";
    echo("Oeuvre " . $i . " : " . $row['Titre_Oeuvre'] . "<br>");
    $i++;
}
if ($i == 1) {
    echo "Pas D'oeuvres";
}
$pdo = null;
?>


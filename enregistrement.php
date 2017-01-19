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
$request = "Select DISTINCT Enregistrement.Titre, Enregistrement.Code_Morceau From Enregistrement
            Where Enregistrement.Code_Morceau=" . $_GET['Code'];
echo "<ul>";
foreach ($pdo->query($request) as $row) {
    echo "<li>";
    echo $row[utf8_decode('Titre')];
    echo "<audio preload=auto src='extrait.php?Code=" . $row['Code_Morceau'] . "' controls></audio>";
    echo '<form method="post" action="achat.php">';
    echo '<input name="Acheter" type="submit" value="Ajouter au panier">';
    echo '</li>';
    $i++;
}
echo "</ul>";
if ($i == 1) {
    echo "Pas D'enregistrements";
}
$pdo = null;
?>

           

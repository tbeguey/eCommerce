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
$request = "Select Enregistrement.Titre, Enregistrement.Code_Morceau From Enregistrement
            Inner join Composition on Enregistrement.Code_Composition = Composition.Code_Composition
	    	Inner join Composition_Oeuvre on Composition_Oeuvre.Code_Composition = Composition.Code_Composition
	    	Inner join Oeuvre on Oeuvre.Code_Oeuvre = Composition_Oeuvre.Code_Oeuvre
            Where Oeuvre.Code_Oeuvre=" . $_GET['Code'];
echo " <h1> Enregistrement associé à cette oeuvre : </h1> ";
foreach ($pdo->query($request) as $row) {
    echo $row[utf8_decode('Enregistrement.Titre')];
    echo "<br>";
    $i++;
}

if ($i == 1) {
    echo "Pas D'enregistrements";
}
$pdo = null;
?>

           

<?php
    $search = $_POST['recherche'];
    // Paramètres de connexion
    $driver = 'sqlsrv';
    $host = 'INFO-SIMPLET';
    $nomDb = 'Classique_Web';
    $user = 'ETD';
    $password = 'ETD';
    // Chaîne de connexion
    $pdodsn = "$driver:Server=$host;Database=$nomDb";
    // Connexion PDO
    $pdo = new PDO($pdodsn, $user, $password);
    $requestMusician = "Select Nom_Musicien, Prénom_Musicien from Musicien Where Nom_Musicien Like '" . $search ."%'";
    $requestWork = "Select Titre_Oeuvre from Oeuvre where Titre_Oeuvre Like '" .$search ."%'";
    foreach ($pdo->query($requete) as $row) 
    {
        echo 'Nom / Prénom : ' . $row[utf8_decode('Nom_Musicien')]. " " . $row[utf8_decode('Prénom_Musicien')]. "<br>";
    }
    foreach ($pdo->query($requestWork) as $row) 
    {
        echo 'Titre_Oeuvre : ' . $row[utf8_decode('Titre_Oeuvre')]."<br>";
    }
    $pdo = null;
?>

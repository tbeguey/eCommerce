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
    $driver = 'sqlsrv';
    $host = 'INFO-SIMPLET';
    $nomDb = 'Classique_Web';
    $user = 'ETD';
    $password = 'ETD';
// Chaîne de connexion
    $pdodsn = "$driver:Server=$host;Database=$nomDb";
// Connexion PDO
    $pdo = new PDO($pdodsn, $user, $password);
    $requestSubscriber = "Select Code_Abonné from Abonné where Nom_Abonné = " . $_SESSION["NOM_USER"];
    $requestWork = "Select Code_Morceau from Enregistrement "; // where dans le panier
    $response = $pdo->query($requestSubscriber);
    foreach ($pdo->query($requestWork) as $row) {
        $request = "Insert into Achat (Code_Enregistrement, Code_Abonné) VALUES(" . $row['Code_Morceau'] . ", " . $response . ")";
        $pdo->exec($request);
    }
$pdo = null;
?>

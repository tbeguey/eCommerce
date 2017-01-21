<?php
    session_start();
    if (!isset($_SESSION["NOM_USER"])){
    header("Location: connexion.php");
    }
    
    $driver = 'sqlsrv';
    $host = 'INFO-SIMPLET';
    $nomDb = 'Classique_Web';
    $user = 'ETD';
    $password = 'ETD';
// Chaîne de connexion
    $pdodsn = "$driver:Server=$host;Database=$nomDb";
// Connexion PDO
    $pdo = new PDO($pdodsn, $user, $password);
    $requestSubscriber = "Select Code_Abonné from Abonné where Nom_Abonné = '" . $_SESSION["NOM_USER"]. "'";
    foreach ($pdo->query($requestSubscriber) as $suscriber){
        foreach ($_SESSION['array'] as $work){
            $request = "Insert into Achat (Code_Enregistrement, Code_Abonné) VALUES(" . $work . ", " . $suscriber[utf8_decode('Code_Abonné')] . ")";
            $pdo->exec($request);
        }
    }
    unset($_SESSION['array']);
    header("Location: index.html");
$pdo = null;
?>

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
    if(!empty($_SESSION['array'])){
        foreach ($_SESSION['array'] as $code){
            $request = "Select Titre, Durée, Prix, Code_Morceau from Enregistrement "
                . "where Code_Morceau = " . $code;
            foreach($pdo->query($request) as $row){
                echo $row[utf8_decode('Titre')];
                echo '<br>';
                echo "<audio preload=auto src='extrait.php?Code=" . $row['Code_Morceau'] . "' controls></audio>";
                echo '<br>';
                echo $row[utf8_decode('Durée')];
                echo '<br>';
                echo $row[utf8_decode('Prix')];
                echo '<br>';
                echo '<form method="post" action="enleverPanier.php?Code='. $row['Code_Morceau'] . '>';
                echo '<input name="OK" type="submit" value="Enlever du panier">'; // un petit logo avec une infobulle ?
                echo '</form>';
                echo '<br>';
                echo '<br>';
            }
        }
    }
    echo '<form method="post" action="acheterPanier.php">';
    echo '<input name="OK" type="submit" value="Acheter">'; // un petit logo avec une infobulle ?
    echo '</form>';
?>

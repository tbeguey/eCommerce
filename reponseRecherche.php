<?php
    session_start();
    if (isset($_SESSION["NOM_USER"])) 
    {
    echo "Bonjour ".$_SESSION["NOM_USER"];
    }
    else
    {
    header("Location: connexion.php");
    }

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
    $requestMusician = "Select distinct Nom_Musicien, Prénom_Musicien, Musicien.Code_Musicien from Musicien inner join Composer on Musicien.Code_Musicien = Composer.Code_Musicien"
        . " inner join Oeuvre on Composer.Code_Oeuvre = Oeuvre.Code_Oeuvre where Nom_Musicien Like '" .$search ."%'";
    $requestWork = "Select Titre_Oeuvre, Code_Oeuvre from Oeuvre where Titre_Oeuvre Like '" .$search ."%'";
    $requestRecording = "Select Titre from Enregistrement where Titre Like '" .$search ."%'";
    
    echo '<h1> Musiciens dont le nom commence par ' . $search . ' : </h1>';
    foreach ($pdo->query($requestMusician) as $row) {
    echo "<a href='oeuvre.php?Code=" . $row['Code_Musicien'] . "'>";
    echo $row[utf8_decode('Nom_Musicien')];
    echo "<img src='image.php?Code=" . $row['Code_Musicien'] . "'/>";
    echo "</a> <br>";
    }
    echo '<h1> Oeuvres dont le titre commence par ' . $search . ' : </h1>';
    foreach ($pdo->query($requestWork) as $row) {
    echo "<a href='enregistrement.php?Code=" . $row['Code_Oeuvre'] . "'>";
    echo $row[utf8_decode('Titre_Oeuvre')];
    echo "</a> <br>";
    }
    echo '<h1> Enregistrements dont le titre commence par ' . $search . ' : </h1>';
    foreach ($pdo->query($requestRecording) as $row){
    echo $row[utf8_decode('Titre')];
    ?>
    <html lang="fr">
    <form method="post" action="achat.php">
    <input name="Acheter" type="submit" value="Acheter">
    <br>
    </form>
    </html>
    <?php
    }
    $pdo = null;
?>


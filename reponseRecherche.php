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
    $requestMusician = "Select Nom_Musicien, Prénom_Musicien, Musicien.Code_Musicien from Musicien inner join Composer on Musicien.Code_Musicien = Composer.Code_Musicien"
        . " inner join Oeuvre on Composer.Code_Oeuvre = Oeuvre.Code_Oeuvre where Nom_Musicien Like :name";
    $requestWork = "Select Titre_Oeuvre from Oeuvre where Titre_Oeuvre Like '" .$search ."%'";
    $stmt = $pdo->prepare($requestMusician);
    $stmt->execute(array('name' => $search . '%'));
    echo '<h1> Musiciens dont le nom commence par ' . $search . ' : </h1>';
    while ($row = $stmt->fetch()) {
    echo "<a href='oeuvre.php?Code=" . $row['Code_Musicien'] . "'/>";
    echo $row['Nom_Musicien'];
    echo "<img src='image.php?Code=" . $row['Code_Musicien'] . "'/>";
    echo "<br>";
}
    foreach ($pdo->query($requestWork) as $row) 
    {
        echo 'Titre_Oeuvre : ' . $row[utf8_decode('Titre_Oeuvre')]."<br>";
    }
    $pdo = null;
?>
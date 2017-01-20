<?php
    session_start();
    if (!isset($_SESSION["NOM_USER"])){
    header("Location: connexion.php");
    }

    $i = 0;
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

    $requestMusician = "Select DISTINCT Nom_Musicien, Prénom_Musicien, Musicien.Code_Musicien, Album.Code_Album from Album
                join Disque on Album.Code_Album = Disque.Code_Album
                join Composition_Disque on Composition_Disque.Code_Disque = Disque.Code_Disque
                join Enregistrement on Enregistrement.Code_Morceau = Composition_Disque.Code_Morceau
                join Composition on Composition.Code_Composition = Enregistrement.Code_Composition
                join Composition_Oeuvre on Composition_Oeuvre.Code_Composition = Composition.Code_Composition
                join Oeuvre on Oeuvre.Code_Oeuvre = Composition_Oeuvre.Code_Oeuvre
                join Composer on Composer.Code_Oeuvre = Oeuvre.Code_Oeuvre
                join Musicien on Musicien.Code_Musicien = Composer.Code_Musicien
                where Nom_Musicien Like '" .$search ."%'";

    $requestWork = "Select DISTINCT Titre_Oeuvre, Album.Code_Album from Album
                join Disque on Album.Code_Album = Disque.Code_Album
                join Composition_Disque on Composition_Disque.Code_Disque = Disque.Code_Disque
                join Enregistrement on Enregistrement.Code_Morceau = Composition_Disque.Code_Morceau
                join Composition on Composition.Code_Composition = Enregistrement.Code_Composition
                join Composition_Oeuvre on Composition_Oeuvre.Code_Composition = Composition.Code_Composition
                join Oeuvre on Oeuvre.Code_Oeuvre = Composition_Oeuvre.Code_Oeuvre
                where Titre_Oeuvre Like '" .$search ."%'";

    $requestAlbum = "Select DISTINCT Titre_Album, Album.Code_Album, Enregistrement.Code_Morceau from Enregistrement
            join Composition_Disque on Composition_Disque.Code_Morceau = Enregistrement.Code_Morceau
            join Disque on Disque.Code_Disque = Composition_Disque.Code_Disque
            join Album on Disque.Code_Album = Album.Code_Album
            where Titre_Album Like '" .$search ."%'";

    $requestRecording = "Select DISTINCT Titre, Code_Morceau, Durée from Enregistrement where Titre Like '" .$search ."%'";

    echo '<h1> Musiciens dont le nom commence par ' . $search . ' : </h1>';
    foreach ($pdo->query($requestMusician) as $row) {
    echo "<a href='album.php?Code=" . $row['Code_Album'] . "'>";
    echo $row[utf8_decode('Nom_Musicien')];
    echo "<img src='image.php?Code=" . $row['Code_Musicien'] . "'/>";
    echo "</a> <br>";
    }

    echo '<h1> Album dont le nom commence par ' . $search . ' : </h1>';
    foreach ($pdo->query($requestAlbum) as $row) {
    echo "<a href='enregistrement.php?Code=" . $row['Code_Morceau'] . "'>";
    echo $row[utf8_decode('Titre_Album')];
    echo "<img src='imageAlbum.php?Code=" . $row['Code_Album'] . "'/>";
    echo "</a> <br>";
    }

    echo '<h1> Oeuvres dont le titre commence par ' . $search . ' : </h1>';
    foreach ($pdo->query($requestWork) as $row) {
    echo "<a href='album.php?Code=" . $row['Code_Album'] . "'>";
    echo $row[utf8_decode('Titre_Oeuvre')];
    echo "</a> <br>";
    }

    echo '<h1> Enregistrements dont le titre commence par ' . $search . ' : </h1>';
    echo "<ul>";
    foreach ($pdo->query($requestRecording) as $row) {
        echo "<li>";
        echo $row[utf8_decode('Titre')];
        echo $row[utf8_decode('Durée')];
        echo "<audio preload=auto src='extrait.php?Code=" . $row['Code_Morceau'] . "' controls></audio>";
        echo '<form method="post" action="achat.php?Code=' .$row['Code_Morceau'] . '">';
        echo '<input type="hidden" name="Code" value=' .$row['Code_Morceau'] . '"></input>';
        echo '<input name="Acheter" type="submit" value="Ajouter au panier">';
        echo '</form>';
        echo '</li>';
    }
    echo "</ul>";

    $pdo = null;
?>

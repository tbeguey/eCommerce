<!doctype html>
<html lang="fr">
<head>
  <link href="materialize/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="materialize/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta charset="utf-8">
  <title>Commerce - Tricha - Beguey</title>
</head>

<body>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
  <script type="text/javascript" src="materialize/js/parallax.js"></script>
  <script type="text/javascript" src="materialize/js/dropdown.js"></script>
  <header>
    <nav>
      <div class="nav-wrapper ">
        <a href="#" class="brand-logo center brown-text darken-1">'N'M</a>
        <form method="post" action="reponseRecherche.php">

          <div class="input-field">
            <input id="search" name="recherche" type="search" required>
            <label for="search"><i class="material-icons">search</i></label>
            <i class="material-icons">close</i>
          </form>

        </nav>
      </div>
    </header>


    <main>
      <div class="parallax-container ">
        <div class="parallax"><img src="materialize/parallux.jpg"></div>
      </div>

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
      where Nom_Musicien Like '%" .$search ."%'";

      $requestWork = "Select DISTINCT Titre_Oeuvre, Album.Code_Album from Album
      join Disque on Album.Code_Album = Disque.Code_Album
      join Composition_Disque on Composition_Disque.Code_Disque = Disque.Code_Disque
      join Enregistrement on Enregistrement.Code_Morceau = Composition_Disque.Code_Morceau
      join Composition on Composition.Code_Composition = Enregistrement.Code_Composition
      join Composition_Oeuvre on Composition_Oeuvre.Code_Composition = Composition.Code_Composition
      join Oeuvre on Oeuvre.Code_Oeuvre = Composition_Oeuvre.Code_Oeuvre
      where Titre_Oeuvre Like '%" .$search ."%'";

      $requestAlbum = "Select DISTINCT Titre_Album, Album.Code_Album, Enregistrement.Code_Morceau, ASIN from Enregistrement
      join Composition_Disque on Composition_Disque.Code_Morceau = Enregistrement.Code_Morceau
      join Disque on Disque.Code_Disque = Composition_Disque.Code_Disque
      join Album on Disque.Code_Album = Album.Code_Album
      where Titre_Album Like '%" .$search ."%'";

      $requestRecording = "Select DISTINCT Titre, Code_Morceau, Durée from Enregistrement where Titre Like '%" .$search ."%'";

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
        echo '<form method="post" action="ajouterPanier.php?Code=' .$row['Code_Morceau'] . '">';
        echo '<input type="hidden" name="Code" value=' .$row['Code_Morceau'] . '"></input>';
        echo '<input name="Acheter" type="submit" value="Ajouter au panier">';
        echo '</form>';
        echo '</li>';
    }
    echo "</ul>";

    $pdo = null;
?>

      <div class="parallax-container">
        <div class="parallax"><img src="materialize/parallux.jpg"></div>
      </div>
      <div class="fixed-action-btn vertical  ">
        <a class="btn-floating btn-large waves-effect waves-light grey lighten-1 "><i class="material-icons brown-text darken-1 grey lighten-1">toc</i></a>
        <ul>
            <li class="waves-effect btn-floating tooltipped  grey lighten-1"data-position="left" data-delay="50" data-tooltip="Sign out"><a href="deconnexion.php"><i class="material-icons brown-text darken-1">power_settings_new</i></a></li>
            <li class="waves-effect btn-floating tooltipped  grey lighten-1"data-position="left" data-delay="50" data-tooltip="Sign in"><a href="connexion.php"><i class="material-icons brown-text darken-1">input</i></a></li>
            <li class="waves-effect btn-floating tooltipped  grey lighten-1"data-position="left" data-delay="50" data-tooltip="Access to your cart"><a href="panier.php"><i class="material-icons brown-text darken-1">shopping_cart</i></a></li>
            <li class="waves-effect btn-floating tooltipped  grey lighten-1"data-position="left" data-delay="50" data-tooltip="Sign up"><a href="Inscription.php"><i class="material-icons brown-text darken-1">mode_edit</i></a></li>
            <li class="waves-effect btn-floating tooltipped  grey lighten-1"data-position="left" data-delay="50" data-tooltip="About our site"><a href="aPropos.html"><i class="material-icons brown-text darken-1">info_outline</i></a></li>
            <li class="waves-effect btn-floating tooltipped  grey lighten-1"data-position="left" data-delay="50" data-tooltip="Go back to menu"><a href="index.html"><i class="material-icons brown-text darken-1">view_headline</i></a></li>
        </ul>
      </div>


    </main>
    <footer class="page-footer grey lighten-1">
      <div class="container">
        <div class="row">
          <h5 class="center brown-text darken-1">A site created by Théo Beguey and Yamin Tricha </h5>
          <div class="col s6 offset-s3 center ">
            <h5 class=" links brown-text darken-1 ">Informations :</h5>
            <ul>
              <li><a class="brown-text darken-1  " href="#!">Contact us </a></li>
              <li><a class="brown-text darken-1" href="aPropos.html">About</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </body>
  </html>

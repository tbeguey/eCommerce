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
        <a href="#" class="brand-logo center brown-text darken-1">PP'N'M</a>
        <form method="post" action="reponseRecherche.php">

        <div class="input-field">
       <input id="search" name="recherche" type="search" required>
       <label for="search"><i class="material-icons">search</i></label>
       <i class="material-icons">close</i>
     </div>

     </form>

  </div>
</nav>

  </header>

  <main>
    <?php
      //  session_start();
      //  if (!isset($_SESSION["NOM_USER"])){
      //  header("Location: connexion.php");
      //  }

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

  echo  "<div class='carousel'>";
  //echo '<h1> Musiciens dont le nom commence par ' . $search . ' : </h1>';
  foreach ($pdo->query($requestMusician) as $row) {
  echo "<a class='carousel-item' href='album.php?Code=" . $row['Code_Album'] . "'><img src='image.php?Code=" . $row['Code_Musicien'] . "'/>";
  echo "<p class='brown-text darken2'>".$row[utf8_decode('Nom_Musicien')]."</p>";


  echo "</a> ";
  }?>
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

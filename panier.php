


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
        <a href="#" class="brand-logo center brown-text darken-1">P'N'M</a>
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
      <div class ="col s6 offset-s3 center brown-text darken-3 blue-grey lighten-2">
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
                        echo '<form method="post" action="enleverPanier.php?Code='. $row['Code_Morceau'] . '">';
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
        <div class="fixed-action-btn vertical  ">
          <a class="btn-floating btn-large waves-effect waves-light grey lighten-1 "><i class="material-icons brown-text darken-1 grey lighten-1">toc</i></a>
          <ul>
            <li class="waves-effect btn-floating tooltipped  grey lighten-1"data-position="left" data-delay="50" data-tooltip="Authentification"><a href="connexion.php"><i class="material-icons brown-text darken-1">input</i></a></li>
            <li class="waves-effect btn-floating tooltipped  grey lighten-1"data-position="left" data-delay="50" data-tooltip="Access to your cart"><a href="panier.php"><i class="material-icons brown-text darken-1">shopping_cart</i></a></li>
            <li class="waves-effect btn-floating tooltipped  grey lighten-1"data-position="left" data-delay="50" data-tooltip="Subscription"><a href="Inscription.php"><i class="material-icons brown-text darken-1">mode_edit</i></a></li>
            <li class="waves-effect btn-floating tooltipped  grey lighten-1"data-position="left" data-delay="50" data-tooltip="About our site"><a href="aPropos.html"><i class="material-icons brown-text darken-1">info_outline</i></a></li>
            <li class="waves-effect btn-floating tooltipped  grey lighten-1"data-position="left" data-delay="50" data-tooltip="Go back to menu"><a href="index2.html"><i class="material-icons brown-text darken-1">view_headline</i></a></li>
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

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
        <div class="section ">
          <form  method="post" action="reponseInscription.php">
            <div class="input-field col s6">
              <input name="nom" type="text" >
              <label class="orange-text darken-1" for="last_name">Name</label>
            </div>
            <div class="input-field col s6">
              <input name="prenom" type="text" >
              <label class="orange-text darken-1" for="last_name">Firstname</label>
            </div>
            <div class="input-field col s6">
              <input name="login" type="text" >
              <label class="orange-text darken-1" for="last_name">Username</label>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input name="password" type="password">
                <label class="orange-text darken-1" for="password">Password</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input name="confirm" type="password">
                <label class="orange-text darken-1" for="password ">Confirm password</label>
              </div>
            </div>
            <input name="Connect" type="submit" value="Sign up">
          </form>
           
      </div>
      <div class="parallax-container">
        <div class="parallax"><img src="materialize/parallux.jpg"></div>
      </div>
      <div class="fixed-action-btn vertical  ">
        <a class="btn-floating btn-large waves-effect waves-light grey lighten-1 "><i class="material-icons brown-text darken-1 grey lighten-1">toc</i></a>
      </a>
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

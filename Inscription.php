<!doctype html>
<html lang="fr">
<head>
  <link href="materialize/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="materialize/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta charset="utf-8">
  <title>eCommerce - Tricha - Beguey</title>
</head>

<body>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
  <script type="text/javascript" src="materialize/js/parallax.js"></script>
  <script type="text/javascript" src="materialize/js/dropdown.js"></script>
  <header>
    <nav>
      <div class="nav-wrapper  grey lighten-1">
        <a href="#" class="brand-logo center brown-text darken-1">P'N'M</a>
        <form method="post" action="reponseRecherche.php">
          <div class="input-field">
            <input id="Label1" type="text" required>
            <label id="label1"><i class="material-icons">shopping_cart</i></label>
          </div>
        </form>
      </nav>
    </div>
  </header>


  <main>
    <div class="parallax-container ">
      <div class="parallax"><img src="materialize/parallux.jpg"></div>
    </div>
    <div class="row container">
      <div class="col s5 offset-s4">
        <div class="section grey lighten-1">
          <div class="row container center brown-text darken-1  ">
          </div>
        </div>
      </div>
    </div>
    <div class="parallax-container">
      <div class="parallax"><img src="materialize/parallux.jpg"></div>
    </div>
    <div class="fixed-action-btn vertical  ">
      <a class="btn-floating btn-large waves-effect waves-light grey lighten-1 "><i class="material-icons brown-text darken-1 grey lighten-1">toc</i></a>
    </a>
    <form method="post" action="reponseInscription.php">
        Nom : <input name="nom" type="text" /><br/>
        Prénom : <input name="prenom" type="text" /><br/>
        Login : <input name="login" type="text" /><br/>
        Mot de passe : <input name="password" type="password" /><br/>
        Confirmer mot de passe : <input name="confirm" type="password" /><br/>
       <input name="Connexion" type="submit" value="S'inscrire">
    </form>
    <ul>
      <li class="waves-effect btn-floating tooltipped  grey lighten-1"data-position="left" data-delay="50" data-tooltip="Authentification"><a href="Connexion.html"><i class="material-icons brown-text darken-1">input</i></a></li>
      <li class="waves-effect btn-floating tooltipped  grey lighten-1"data-position="left" data-delay="50" data-tooltip="Access to your cart"><a href="index2.html"><i class="material-icons brown-text darken-1">shopping_cart</i></a></li>
      <li class="waves-effect btn-floating tooltipped  grey lighten-1"data-position="left" data-delay="50" data-tooltip="Subscription"><a href="Inscription.html"><i class="material-icons brown-text darken-1">mode_edit</i></a></li>
      <li class="waves-effect btn-floating tooltipped  grey lighten-1"data-position="left" data-delay="50" data-tooltip="About our site"><a href="aPropos.html"><i class="material-icons brown-text darken-1">info_outline</i></a></li>
      <li class="waves-effect btn-floating tooltipped  grey lighten-1"data-position="left" data-delay="50" data-tooltip="Go back to menu"><a href="index2.html"><i class="material-icons brown-text darken-1">view_headline</i></a></li>
    </ul>
  </div>


</main>
<footer class="page-footer grey lighten-1">
  <div class="container">
    <div class="row">
      <div class="col l6 offset-s5 ">
        <h5 class="center brown-text darken-1">A site created by Théo Sheguey and Marmoud </h5>
      </div>
      <div class="col s6 ">
        <h5 class=" links brown-text darken-1">Informations </h5>
        <ul>
          <li><a class="brown-text darken-1" href="#!">Contact us </a></li>
          <li><a class="brown-text darken-1" href="aPropos.html">About</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
</body>
</html>

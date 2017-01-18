


<!doctype html>
<html lang="fr">
<head>
  <link href="materialize/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
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
        <input id="search" type="search" required>
        <label for="search">Search:<i class="material-icons"></label>
      </div>
    </form>
   </nav>
    </div>
</header>


<main>
  <div class="parallax-container ">
     <div class="parallax"><img src="materialize/parallax.jpg"></div>
   </div>
   <div class="section grey lighten-1">
     <div class="row container">
       <div class="col s6"

           <form method="post" action="reponseConnexion.php">
       	Nom : <input name="Login" type="text" /><br/>
      Mot de passe: <input name="Password" type="text" /><br/>
       	<input name="Connect" type="submit" value="Connecter" />
           </form>
</div>
     </div>
   </div>
   <div class="parallax-container">
     <div class="parallax"><img src="materialize/parallax.jpg"></div>
   </div>




          <div class="fixed-action-btn toolbar  ">
            <a class="btn-floating btn-large waves-effect waves-light grey lighten-1 "><i class="material-icons brown-text darken-1 grey lighten-1">+</i></a>
                <i class=""> </i>
            </a>
            <ul>
              <li class="waves-effect waves-light"><a href="connexion.php"><i class="material-icons brown-text darken-1">LOGIN</i></a></li>
              <li class="waves-effect waves-light"><a href="#!"><i class="material-icons brown-text darken-1">MY CART</i></a></li>
              <li class="waves-effect waves-light"><a href="#!"><i class="material-icons brown-text darken-1">SUBSCRIPTION</i></a></li>
              <li class="waves-effect waves-light "><a href="#!"><i class="material-icons brown-text darken-1">SETTINGS</i></a></li>
              <li class="waves-effect waves-light "><a href="index2.html"><i class="material-icons brown-text darken-1">MENU</i></a></li>
            </ul>
          </div>


</main>

<footer>




    <footer class="page-footer grey lighten-1">
      <div class="container">
        <div class="row">
          <div class="col l6 offset-m8 ">
            <h5 class="center brown-text darken-1">A site created by Théo Sheguey and Marmoud </h5>
          </div>
          <div class="col l1 ">
            <h5 class=" links brown-text darken-1">Informations </h5>
            <ul>
              <li><a class="brown-text darken-1" href="#!">Contact us </a></li>
                <li><a class="brown-text darken-1" href="aPropos.html">About</a></li>


            </ul>
          </div>
        </div>
      </div>

    </footer>

          </footer>


      </footer>



</body>


</html>

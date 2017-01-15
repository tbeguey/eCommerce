<?php
    $Password = $_REQUEST["Password"];
    $Login=$_REQUEST["Login"];
    // recherche si l'utilisateur est enregistré et possède le bon mot de passe
    $conn = odbc_connect("Classique_Web", "ETD", "ETD", SQL_CUR_USE_ODBC) or die ("raté");
    $query = "Select Nom_Abonné from Abonné where Login ='".$Login."' and Password ='".$Password."'";
    $result = odbc_exec($conn,$query);
    if ($row = odbc_result($result,1)) {//utilisateur enregistré avec mot de passe correct
	    session_start();
	    $_SESSION["NOM_USER"]= odbc_result($result,1);
	    odbc_close($conn);
	    echo "a";
	    header("Location: index.html");
    }
    else
    {//Mot de passe (et/ou login) incorrect : rejet de l'utilisateur
	    echo "b";
	    header("Location: connexion.php);
    }
?>
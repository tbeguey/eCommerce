<?php
    $Password = $_REQUEST["Password"];
    $Login=$_REQUEST["Login"];
    $dbh = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");
    // recherche si l'utilisateur est enregistré et possède le bon mot de passe
    $queryCount = "Select Count(*) from Abonné where Login ='".$Login."' and Password ='".$Password."'";
    $query = "Select Nom_Abonné from Abonné where Login ='".$Login."' and Password ='".$Password."'";
    $stmt = $dbh->query($queryCount);
    //echo "<h1> " . $stmt->fetchColumn() . "</h1>";
    if($stmt->fetchColumn() > 0){ //utilisateur enregistré avec mot de passe correct
        echo "<p>if</p>";
        session_start();
        foreach ($dbh->query($query) as $row){
            echo "her";
            $_SESSION["NOM_USER"] = $row[0];
            echo "here";
        }
        echo "hereeeee";
        header("Location: index.html");        
    }
    //else{//Mot de passe (et/ou login) incorrect : rejet de l'utilisateur
    //    header("Location: connexion.php");
    //}
    $dbh = null;
?>

<?php
    /*session_start();
    if (isset($_SESSION["NOM_USER"])) 
    {
    echo "Bonjour ".$_SESSION["NOM_USER"];
    }
    else
    {
    header("Location: connexion.php");
    }*/
    session_start();
    $url = $_REQUEST["url"];
    session_destroy();
    header("Location: ".$url);
?>
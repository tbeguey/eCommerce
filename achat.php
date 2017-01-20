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
    $work = $_GET['Code'];
    $array = $_SESSION['array'];
    array_push($array, $work);
    $_SESSION['array'] = $array;
?>


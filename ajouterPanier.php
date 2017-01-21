<?php
    session_start();
    if (!isset($_SESSION["NOM_USER"])){
    header("Location: connexion.php");
    }
    var_dump($_SESSION['array']);
    array_push($_SESSION['array'], $_GET['Code']);
    var_dump($_SESSION['array']);
    header("Location: index.html");
?>


<?php
    session_start();
    if (!isset($_SESSION["NOM_USER"])){
    header("Location: connexion.php");
    }
    array_push($_SESSION['array'], $_GET['Code']);
?>


<?php
    session_start();
    if (!isset($_SESSION["NOM_USER"])){
    header("Location: connexion.php");
    }
    if(isset($_SESSION['array'])){
    	array_push($_SESSION['array'], $_GET['Code']);
    }

    header("Location: panier.php");
?>


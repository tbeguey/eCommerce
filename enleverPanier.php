<?php
    session_start();
    if (!isset($_SESSION["NOM_USER"])){
    header("Location: connexion.php");
    }
    if(isset($_SESSION['array'])){
    	$key = array_search($_GET['Code'], $_SESSION['array']);
    	unset($_SESSION['array'][$key]));
		$_SESSION['array'] = array_values($_SESSION['array']);
    }

    header("Location: panier.php");
?>


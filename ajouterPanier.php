<?php
    session_start();
    if (!isset($_SESSION["NOM_USER"])){
    header("Location: connexion.php");
    }
    if(isset($_SESSION['array'])){
    	var_dump($_SESSION['array']);
    	array_push($_SESSION['array'], $_GET['Code']);
    	var_dump($_SESSION['array']);
    }
    else{
    	echo "existe pas";
    }

    //header("Location: index.html");
?>


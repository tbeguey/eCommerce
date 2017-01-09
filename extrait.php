<?php

$pdo = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD$
$stmt = $pdo->prepare("SELECT Extrait FROM Enregistrement WHERE Code_Morceau=?");
$stmt->execute(array($_GET['Code']));
$sound = $row['Extrait'];
echo $sound;
?> 

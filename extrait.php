<?php
$pdo = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");
$stmt = $pdo->prepare("SELECT Extrait FROM Enregistrement WHERE Code_Morceau=?");
$stmt->execute(array($_GET['Code']));
$stmt->bindColumn(1, $data, PDO::PARAM_LOB);
$stmt->fetch(PDO::FETCH_BOUND);
$sound = pack("H*", $data);
header("Content-Type: audio/mpeg");
echo $sound;
?>

<?php
$pdo = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD$");
$stmt = $pdo->prepare("SELECT Pochette FROM Oeuvre
	Inner join Composer on Composer.Code_Oeuvre = Oeuvre.Code_Oeuvre
	Inner join Musicien on Musicien.Code_Musicien = Composer.Code_Musicien
	Inner join Genre on Genre.Code_Genre = Musicien.Code_Genre
	Inner join Album on Album.Code_Genre = Genre.Code_Genre
	WHERE Code_Oeuvre=?");
$stmt->execute(array($_GET['Code']));
$stmt->bindColumn(1, $lob, PDO::PARAM_LOB);
$stmt->fetch(PDO::FETCH_BOUND);
$image = pack("H*", $lob);
header("Content-Type: image/jpeg");
echo $image;
?> 


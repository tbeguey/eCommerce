<?php
$dbh = new PDO("sqlsrv:Server=INFO-SIMPLET;Database=Classique_Web", "ETD", "ETD");
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$login = $_POST['login'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$query = "INSERT INTO Abonné (Nom_Abonné, Prénom_Abonné, Login, Password) VALUES (:nom,:prenom,:log,:pass)";
$stmt = $dbh->prepare($query);
if($password == $confirm){
	$stmt->execute(array(':nom' => $nom,
    ':prenom' => $prenom,
    ':log' => $login,
    ':pass' => $password));
echo "Insertion effectué";
}
else{
    echo "Mot de passe différent";
}
?>
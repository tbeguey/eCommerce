// Connexion PDO
$pdo = new PDO($pdodsn, $user, $password);
$request = "Select Enregistrement.Titre_Enregistrement From Enregistrement
            Inner join Oeuvre on Oeuvre.Code_Oeuvre = Enregistrement.Code_Oeuvre
            Where Oeuvre.Code_Oeuvre=" . $_GET['Code'];
echo " <h1> Enregistrement associée à cette oeuvre : </h1> ";
foreach ($pdo->query($request) as $row) {
    echo("Enregistrement " . $i . " : " . $row['Titre_Enregistrement'] . "<br>");
    $i++;
}
if ($i == 1) {
    echo "Pas D'enregistrements";
}
$pdo = null;
?>


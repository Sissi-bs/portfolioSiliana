<!DOCTYPE html>
<html>
<head>
 <title> Base de données produits </title>
<link rel="stylesheet" href="tableau.css">
 </head>
<meta charset="utf-8"/>
<body> 
<?php

 //données pour la connexion à la BdD
$host = "php";
$user="php";
$password="php";
$database = "Produits";

//connexion à la BdD
$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->connect_errno) {
die ("Echec lors de la connexion "
. $mysqli->connect_error);
}

else{
    echo "<p> Connecté au serveur $host, à la base $database </p>" ;
}

$resultat=$mysqli->query("SELECT * FROM Produit");
$titres = $resultat -> fetch_fields() ;
echo "<table style= 'border: 1px solid black'>";
echo "<tr>";
foreach ($titres as $colonne) {
echo "<th> ".$colonne->name ." </th>" ;
}
echo "</tr>";
echo "<tr>" ;
while ($l = $resultat -> fetch_object()){
echo "<td> ".$l->code ." </td>" ;
echo "<td> ".$l->nom ." </td>" ;
echo "<td> ".$l->description ." </td>" ;
echo "<td> ".$l->prix ." </td>" ;
echo "</tr>" ;
}
?>

</table>
</body>

</html>
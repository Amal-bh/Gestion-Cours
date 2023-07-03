<?php 
require_once("connectiondb.php");
$nomf=isset($_POST['nomf'])?$_POST['nomf']:"";
$niveau=isset($_POST['niveau'])?strtoupper($_POST['niveau']):"";

$requete="insert into filiere(nomFilere,niveau) values(?,?)";
$params=array($nomf,$niveau);
$resultat=$pdo->prepare($requete);
$resultat->execute($params);

header('location:filiere.php');



?>
<?php 
require_once("connectiondb.php");
$idf=isset($_POST['idF'])?$_POST['idF']:0;
$nomf=isset($_POST['nomf'])?$_POST['nomf']:"";
$niveau=isset($_POST['niveau'])?strtoupper($_POST['niveau']):"";

$requete="update filiere set nomFilere=?,niveau=? where idFiliere=?";
$params=array($nomf,$niveau,$idf);
$resultat=$pdo->prepare($requete);
$resultat->execute($params);

header('location:filiere.php');



?>
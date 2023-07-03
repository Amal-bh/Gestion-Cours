<?php 
require_once("connectiondb.php");
$idf=isset($_GET['idF'])?$_GET['idF']:0;

$requeteCours="select count(*) countCours from cours where idFiliere=$idf";
$resultatCours=$pdo->query($requeteCours);
$tabCountCours=$resultatCours->fetch();
$nbrCours=$tabCountCours['countCours'];

if($nbrCours==0) { 

$requete="delete from filiere  where idFiliere=?";
$params=array($idf);
$resultat=$pdo->prepare($requete);
$resultat->execute($params);
header('location:filiere.php');
} else {
$msg="Supprission Impossible : Vous devez supprimer tous les cours qui existe dans cette filiere !";
header("location:alerte.php?message=$msg");
}





?>
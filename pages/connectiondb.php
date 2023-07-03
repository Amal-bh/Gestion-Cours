<?php
   try {
    $pdo= new PDO("mysql:host=localhost;dbname=gestion_cours","root","");

   } catch( Exception $e) {
        die('Erreur de connection' .$e->getMessage());
   }
 


?>
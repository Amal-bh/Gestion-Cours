<?php 

require_once("connectiondb.php");

$idf=isset($_GET['idF'])?$_GET['idF']:0;

$requete="select * from filiere where idFiliere=$idf";
$resultat=$pdo->query($requete);

$filiere=$resultat->fetch();

$nomf=$filiere['nomFilere'];
$niveau=strtolower($filiere['niveau']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Edition d'une Filiére</title>
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
     <!-- Bootstrap CSS -->  
      <!-- style css -->  
      <link rel="stylesheet" href="style.css">
   <!-- style css -->

</head>
<body>
    <?php 
    include('menu.php'); ?>
    
    <div class="container"> 
        

          <div class="card border-primary mb-3 margetop" style="max-width: 180rem;">
           <div class="card-header t1"></div>
            <div class="card-body text-primary">
                <h5 class="card-title"> Edition de la Filiére</h5>
                <form method="post" action="updateFiliere.php"  class="form">
                    <div class="form-group">
                    <label for="niveau"> id de la Filiére : <?php echo $idf ?></label>   
                    <input type="hidden" name="idF"  class="form-control" 
                    value="<?php echo $idf ?>"/>
                    </div>  

                    <div class="form-group">
                    <label for="niveau">Nom de la Filiére :</label> &nbsp   
                    <input type="text" name="nomf" placeholder="Taper Nom de la filiere" 
                    class="form-control" value="<?php echo $nomf ?>"/>
                    </div>  &nbsp

                    <label for="niveau">Niveau :</label> &nbsp &nbsp
                           
                    <select name="niveau" class="form-control" id="niveau">
                      <option value="b" <?php if($niveau=="b") echo "selected" ?> >Baccalauriat</option>
                      <option value="t" <?php if($niveau=="t") echo "selected" ?> >Technicien</option>
                      <option value="ts" <?php if($niveau=="ts") echo "selected" ?>>Technicien supérieure</option>
                      <option value="l" <?php if($niveau=="l") echo "selected" ?>>Licence</option>
                      <option value="m" <?php if($niveau=="m") echo "selected" ?> >Master</option>
                    </select> &nbsp &nbsp
</br>
                    <button type="submit" class="btn btn-success">
                    <i class="fa fa-save"></i>
                    &nbsp &nbsp
                      Enregistrer </button> &nbsp &nbsp
                      
                            
                       </form>
        </div>
          </div>
    </div>








</body>
</html>
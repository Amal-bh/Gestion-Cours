<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Nouvelle Filiére</title>
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
           <div class="card-header t1">Veuillez saisir les données de la nouvelle filiére</div>
            <div class="card-body text-primary">
                <h5 class="card-title"> Nouvelle Filiére</h5>
                <form method="post" action="insertFiliere.php"  class="form">
                    <div class="form-group">
                    <label for="niveau">Nom de la Filiére :</label> &nbsp   
                    <input type="text" name="nomf" placeholder="Taper Nom de la filiere" class="form-control" required/>
                    </div>  &nbsp
                    <label for="niveau">Niveau :</label> &nbsp &nbsp
                           
                    <select name="niveau" class="form-control" id="niveau">
                      <option value="B" >Baccalauriat</option>
                      <option value="T" >Technicien</option>
                      <option value="Ts" >Technicien supérieure</option>
                      <option value="L" >Licence</option>
                      <option value="M" >Master</option>
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
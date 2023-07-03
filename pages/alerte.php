<?php 
$message=isset($_GET['message'])?($_GET['message']):"Erreur";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Alerte </title>
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
        <div class="card border-danger mb-3 margetop" style="max-width: 180rem;">
           <div class="card-header t4"> <h2 class="t4 t6"> Alerte Erreur </h2> </div>
            <div class="card-body text-danger">
                
                  <h3> <?php echo $message ?> </h3>
                  <h4> <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Retour...</a></h4> 
        </div>
          </div>
            
          <div class="alert alert-danger" role="alert">
            <div class="alert-heading"> <h2> Alerte Erreur </h2> </div>
            <hr>
            
                
                  <h3> <?php echo $message ?> </h3>
                  <h4> <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Retour...</a></h4> 
        </div>
            
          
</div> 
        </div>
          
    








</body>
</html>
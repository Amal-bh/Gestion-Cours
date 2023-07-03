<?php
  require_once("connectiondb.php");
  
   /*if(isset($_GET['nomF']))
  $nomF=$_GET['nomF']; 
    else 
  $nomF=""; */
   $size=6;
      $page=2 ;
   $offset=($page-1)*$size;


   $nomf=isset($_GET['nomf'])?$_GET['nomf']:"";
   $niveau=isset($_GET['niveau'])?$_GET['niveau']:"all";

   $size=isset($_GET['size'])?$_GET['size']:6;
      $page=isset($_GET['page'])?$_GET['page']:1;
   $offset=($page-1)*$size;
    
   if($niveau=="all") {

   $requete="select * from filiere where nomFilere like '%$nomf%' limit $size offset $offset";
   $requeteCount="select count(*) CountF from filiere where nomFilere like '%$nomf%'";
  } else { 
    $requete="select * from filiere where nomFilere like '%$nomf%' and niveau='$niveau' limit $size offset $offset"; 
    $requeteCount="select count(*) CountF from filiere where nomFilere like '%$nomf%' and niveau='$niveau'";
  }
             $resultatF=$pdo->query($requete);
             $resultatCount=$pdo->query($requeteCount);
             $tabCount=$resultatCount->fetch();
             $nbrFiliere=$tabCount['CountF'];
             $reste=$nbrFiliere % $size;  //* % operateur modulo pour la division eucludienne */
             if ($reste===0)
              $nbrpage=$nbrFiliere/$size;
                  else 
                  $nbrpage=floor($nbrFiliere/$size)+1;       /* floor donne la partie entiere d'un nombre decimal */      

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Gestion des Filiére</title>
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
     <!-- Bootstrap CSS -->  
     <!-- style css -->  
     <!-- <link rel="stylesheet" href="style.css"> -->
   <!-- style css -->
<!-- Favicons -->
<link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="Accueil.php">Gestion des Cours</a></h1>
      <!-- Uncomment below if you prefer to use an image logo loader -->
      <!-- <a href="index.html" class="logo me-auto"><img src="../assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="active" href="Accueil.php">Accueil</a></li>
          <li><a href="Aboutt.php">A Propos </a></li>
          <li><a href="cours.php">Cours</a></li>
          <li><a href="filiere.php">Filiere</a></li>
          <li><a href="events.html">Evenements</a></li>
          <li><a href="contact.php">Contacter Nous</a></li>

          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar img-->

      <a href="courses.html" class="get-started-btn">Se Connecter</a>

    </div>
  </header><!-- End Header -->

</head>
<body>
    <?php 
    // include('menu.php'); ?>
    <div class="container"  style="margin-top: 100px;"> 
        <div class="card border-success mb-3 margetop" style="max-width: 180rem;">
           <div class="card-header t2"> Rechercher des filiéres</div>
            <div class="card-body text-success">
                <h5 class="card-title"></h5>
                  <form method="get" action="filiere.php"  class="form-inline">
                    <div class="form-group">
                    <input type="text" name="nomf" placeholder="Taper Nom de la filiere" class="form-control" 
                    value="<?php echo $nomf ?>"/>
                    </div>  &nbsp
                          <label for="niveau">Niveau :</label> &nbsp
                           
                    <select name="niveau" class="form-control" id="niveau" onchange="this.form.submit()">
                      <option value="all" <?php if($niveau==="all" ) echo "selected" ?>>Tous les niveaux</option>
                      <option value="B" <?php if($niveau==="B" ) echo "selected" ?>>Baccalauriat</option>
                      <option value="T" <?php if($niveau==="T" ) echo "selected"  ?>>Technicien</option>
                      <option value="Ts" <?php if($niveau==="Ts") echo "selected" ?>>Technicien supérieure</option>
                      <option value="L" <?php if($niveau==="L"  ) echo "selected" ?>>Licence</option>
                      <option value="M" <?php if($niveau==="M" ) echo "selected" ?>>Master</option>
                    </select> &nbsp 
                    
                    <button type="submit" class="btn btn-success">
                    <i class="fa fa-search"></i>

                      Rechercher...</button> &nbsp &nbsp
                      <a href="NouvelleFiliere.php"> <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-file-plus-fill" viewBox="0 0 16 16">
  <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM8.5 6v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z"/>
</svg> </i>Nouvelle Filiére</a>  
                            
                       </form>
                  
        </div>
          </div>

          <div class="card border-primary mb-3 margetop" style="max-width: 180rem;">
           <div class="card-header t1">Liste des Filiéres (<?php echo $nbrFiliere ?> Filiéres)</div>
            <div class="card-body text-primary">
                <h5 class="card-title"> Tableau des Filiéres</h5>
                  <table class="table table-striped  table-bordered">
                    <thead>
                       <tr>
                         <th>IdFiliere</th> <th>Nom Filiere</th> <th> Niveau</th> <th> Actions</th>
                       </tr>
                    </thead>
                       <tbody>
                        
                             <?php  while($filiere=$resultatF->fetch()) {?>
                              <tr>
                                <td> <?php echo $filiere['idFiliere'] ?></td>
                                <td> <?php echo $filiere['nomFilere'] ?></td>
                                <td><?php echo $filiere['niveau'] ?></td>
                               
                                <td>  
                      <a      
              href="EditerFiliere.php?idF=<?php echo $filiere['idFiliere'] ?>"> <i class="fa fa-edit"> </i>  </a> &nbsp &nbsp 
          <a onclick="return confirm('Etes vous sur vouloir supprimer la filiere ?')"
            href="SupprimerFiliere.php?idF=<?php echo $filiere['idFiliere'] ?>"> <i class="fa fa-trash"></i> </a> 
                                    </td>
                              </tr>
                              <?php } ?>
                         
                       </tbody>
                  </table>
                  <div>
                  <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-md">
                    <?php for($i=1;$i<=$nbrpage;$i++) {  ?>
                       <li class="page-item  <?php if($i==$page) echo 'active' ?>"  > 
                        <a  class="page-link" href="filiere.php?page=<?php echo $i;?>&nomf=<?php echo $nomf ?>&niveau=<?php echo $niveau ?>">  
                          <?php     echo $i;   ?> </a> </li>   
                      <?php  } ?>
                      </ul> 
                  </nav>
                 </div>

                  
                  
        </div>
          </div>
    </div>

    <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

        
</body>
</html>
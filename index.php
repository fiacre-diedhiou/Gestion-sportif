<?php 
 $bdd=new PDO('mysql:host=localhost;dbname=tagate','root','');
  
?>


<!DOCTYPE html>
<html>
<head>
  <title>Acceuil</title>
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" type="text/css" href="views/style/style2.css">
     <link rel="stylesheet" type="text/css" href="views/style/style3.css">
     <link rel="stylesheet" type="text/css" href="">
     <link rel="stylesheet" type="text/css" href="views\style\fontawesome\fontawesome-free-5.15.1-web\css\fontawesome.min.css">
    <link rel="stylesheet" href="views/style/bootstrap-4.5.3-dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<style type="text/css">
  #alert {
  padding: 2px;
  background-color: #000;
  color: white;
  height: 75px;
 /* width: 1500px;*/ 
  font-size: 15px;
  opacity: 0.5;


}

.closebtn {
  margin-left: 15px;
  color: white;
  float: right;
  font-size: 19px;
  line-height: 7px;
  cursor: pointer;
  transition: 0.3s;
  font-weight: bolder;
}

.closebtn:hover {
  color: black;
}
</style>
<body>
<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-dark text-info" id="nav">
  <a class="navbar-brand" href="#">
    <img src="views/style/image/LOGO juli.jpg" alt="logo" style="width:50px;">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto font-weight-bold">
      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="fa fa-home" aria-hidden="true"></i>Acceuil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="views/Resultats.php"><i class="fa fa-info" aria-hidden="true"></i>&nbspInformation</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="views/programme.php"><i class="fa fa-sticky-note" aria-hidden="true"></i>&nbspProgramme</a>
      </li>
      <li>
        <li class="nav-item">
        <a class="nav-link" href="views/tournoi/"><i class="fa fa-trophy" aria-hidden="true"></i>tournoi</a>
      </li>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle bg-dark" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Disciplines
        </a>
        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
       <?php
       require_once('model/typeSportDao.php');
       $result=ReqSport();
        while ($tab=mysqli_fetch_assoc($result)) {
         ?>
          <a class="dropdown-item bg-dark " href="views/discipline.php?id=<?=$tab['NomSport']?>"><?=$tab['NomSport']?></a>
        <?php
         }
         ?>
        </div>
      </li>
    </ul> 
    <form class="form-inline my-2 my-lg-0">
     <!-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
     <a class="btn btn-outline-info text-light my-2 my-sm-0 font-weight-bold" href="views/inscription.php"><i class="fa fa-subscript" aria-hidden="true"></i>Créer Compte</a>&nbsp
      <a class="btn btn-outline-primary text-light my-2 my-sm-0 font-weight-bold" href="views/connection.php"><i class="fa fa-user" aria-hidden="true"></i>Connexion</a>
    </form>
  </div>
</nav><br>
<div class="jumbotron text-center  " id="jumbotron" style="margin-bottom:0">
   <p> Tea<span style="color: red; text-shadow: -1px -1px 1px #aaa , 0px 4px 1px rgba(0,0,0,0.5), 4px 4px 5px rgba(0,0,0,0.7), 0px 0px 7px rgba(0,0,0,0.4);">M</span>eet</p>
  <!-- <p>Bienvenue dans votre salon de sports favoris</p>  -->
<div id="alert" class="container-fluid col-sm-6 fixed-bottom">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    <p>Pour des besoins de réservation d'espace de jeux veuillez utiliser le buton ci-dessous</p>
   <button type="button"  onclick="myFunction()" class="btn btn-primary btn-sm">cliquer ici</button>
</div>
</div>
<script>
function myFunction() {
  alert("fonctionnalité non disponible");
}
</script>
<!---------------------------------------------------------------

|AFFISAGE
|POUR LA PUBLICITE

------------------------------------------------------------------>

<?php
   $getImage=$bdd->query('SELECT *FROM pub');
   $image=$getImage->fetch();  
//selectionner la deuxieme image
   $getImage2=$bdd->prepare('SELECT *FROM pub WHERE id>?');
   $getImage2->execute(array($image['id']));
   $image2=$getImage2->fetch(); 
//selectionner la troixieme image
   $getImage3=$bdd->prepare('SELECT *FROM pub WHERE id>?');
   $getImage3->execute(array($image2['id']));
   $image3=$getImage3->fetch(); 
//selectionner le lien de youtube
   $getVideo=$bdd->query('SELECT *FROM video');
   $getLien=$getVideo->fetch(); 
   
?>
<!---------------------------------------------------------------

|PUB
|POUR ANNONCE

------------------------------------------------------------------>
<div class="container"  style="margin-top:30px; background-color:#F0F8FF; margin-top: -15px;  box-shadow: 5px 10px 8px 10px #888888;">
  <div class="row">
    <div class="col-sm-4">
      <h2 class="btn btn-info">Annonce</h2>
      <h5>Publicité:</h5>
 <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="views/style/image/pub/<?=$image['image']?>" width="100" height="200" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Annonce</h5>
        <p><?=$image['NomImage']?></p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="views/style/image/pub/<?=$image2['image']?>" width="100" height="200" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Annonce</h5>
        <p><?=$image2['NomImage']?></p>
      </div>
    </div>
     <div class="carousel-item">
      <img src="views/style/image/pub/<?=$image3['image']?>" width="100" height="200" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Annonce</h5>
        <p><?=$image3['NomImage']?></p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  <p><marquee style="background-color: #008080; color: #ffffff" > Pour toute information publicitaire veuillez nous renseigner sur telephone</marquee></p>
      <h3>LIENS</h3>
         <p>Pour toute information</p>
      <ul class="nav nav-pills flex-column">
        <li class="nav-item" >
          <a class="nav-link active" style="background-color: black;"  href="#">Active</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Actualité sportif</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://www.bing.com/search?q=foot+mercato&cvid=c070e154bc75443d8f07ab192fea8a68&FORM=ANAB01&PC=U531">Actualité mercato</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">Direct</a>
        </li>
      </ul>
      <hr class="d-sm-none">
    <!------------------------------------------------------------------------------->
    </div>
    <div class="col-sm-8">
      <h2  class="btn btn-info"><i class="fa fa-users fa-3x" aria-hidden="true"></i></h2>
      <!--football-->
      <h5></h5>
      <div id="fakeimg-foot1">
      <div class="fakeimg bg-image hover-zoom" id="fakeimg-foot"> </div>
        <p class="btn btn-info text-light">Chaque équipe dispose d'un administrateur qui se charge d'organiser les rencontres à partir de son compte Team meet, les autres membres, quant à eux ne peuvent agir quand tant que visiteur.</p>
      </div>
      <br>
      <!------------------------------------------>
      <h2 class="btn btn-info"><i class="fa fa-user fa-fw fa-3x" ></i></h2>
       <!--basket-->
      <h5></h5>
      <div id="fakeimg-foot1">
      <div class="fakeimg" id="fakeimg-basket"></div>
      <p></p>
      <p class="btn btn-info text-light">Chaque membre individuel est administrateur direct de son compte Team Meet et ainsi organiser ses propre renconter</p>
      </div>
      <h5  class="btn btn-info"><i class="fa fa-magic fa-3x" aria-hidden="true"></i>VIDEO TUTO</h5>
      <div class="embed-responsive embed-responsive-16by9">
         <iframe width="560" height="315" src=" <?php echo $getLien['Lien']?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div> <br>
    </div>
  </div>
</div><br>

 <!--****************************************************************************footer************************************************************************************************************************-->
<div class="jumbotron text-center" id="footer" style="margin-bottom:0">
<!-- Footer -->
<footer class="page-footer font-small mdb-color lighten-3 pt-4">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 mr-auto my-md-4 my-0 mt-4 mb-1">

        <!-- Content -->
        <h5 class="font-weight-bold text-uppercase mb-4">TEAM MEET</h5>
        <p>Pour toute information demande aide.</p>
        <p>Notre equipe est à votre disposition </p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 mx-auto my-md-4 my-0 mt-4 mb-1">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mb-4">Menu</h5>

        <ul class="list-unstyled" >
          <li>
            <p>
              <a href="#" style="color: #ffffff;">Acceuil</a>
            </p>
          </li>
          <li>
            <p>
              <a href="views/Resultats.php" style="color: #ffffff;">Information</a>
            </p>
          </li>
          <li>
            <p>
              <a href="views/programme.php" style="color: #ffffff;">Programme</a>
            </p>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 mx-auto my-md-4 my-0 mt-4 mb-1">

        <!-- Contact details -->
        <h5 class="font-weight-bold text-uppercase mb-4">Contact</h5>

        <ul class="list-unstyled">
          <li>
            <p>
              <i class="fas fa-home mr-3"></i> Dakar Parcelles Assainies</p>
          </li>
          <li>
            <p>
              <i class="fas fa-envelope mr-3"></i>teaMeat@example.com</p>
          </li>
          <li>
            <p>
              <i class="fas fa-phone mr-3"></i> +00221777935066</p>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-2 col-lg-4 text-center mx-auto my-4">

        <!-- Social buttons -->
        <h5 class="font-weight-bold text-uppercase mb-4">réseau sociaux</h5>

        <!-- Facebook -->
        <a type="button" href="https://www.facebook.com/teameet.meet" class="btn-floating btn-fb" id="fab-floating">
          <i class="fab fa-facebook-f"></i>
        </a>
        <!-- Twitter -->
        <a type="button" class="btn-floating btn-tw" id="tw-floating">
          <i class="fab fa-twitter"></i>
        </a>
        <!-- Google +-->
        <a type="button" class="btn-floating btn-gplus" id="goo-floating">
          <i class="fab fa-google-plus-g"></i>
        </a>
        <!-- Dribbble -->
        <a type="button" class="btn-floating btn-dribbble" id="inst-floating">
          <i class="fab fa-instagram"></i>
        </a>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright:
    <a href="#">le goupe team meet senegal</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
 
   <!--footer-->
</div>
</body>
</html>
</body>
<script src="views\style\fontawesome\fontawesome-free-5.15.1-web\js\all.js" ></script>
<script src="views\style/bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="views\style/js/jquery-3.5.1.slim.min.js"></script>
<script src="views/style/bootstrap-4.5.3-dist/js/bootstrap.bundle.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="views/style/style.js"></script>
</html>
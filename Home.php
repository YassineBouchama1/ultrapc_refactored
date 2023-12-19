<?php 

session_start();
include 'backend/DataBase.php';
$Database = new Database();


function calc($numbre)  {
    $num = count($numbre);
    return ($num / 100) * 100;
}



$AdminData =  $Database->selectData('admin','*','','id ASC');
$numAdminData = calc($AdminData);


$categorieData =  $Database->selectData('categorie','*','','');
$numcategorie = calc($categorieData);


$produitData =  $Database->selectData('produit','*','','');
$numproduit = calc($produitData);


$UsersData =  $Database->selectData('users','*','is_Active = 1','id DESC');
$numUsersData = calc($UsersData);


$details_commandeData =  $Database->selectData('details_commande','*','confirm_achter = 0','details_id DESC');
$commandeData = calc($details_commandeData);


$commandeData1 =  $Database->selectData('details_commande','*','confirm_achter = 1','details_id DESC');
$commandeData1 = calc($commandeData1);

?>


<?php if ( !empty($_SESSION["admin"])) {  ?>

<!DOCTYPE html>
<html lang="en">
<head>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">




<!-- Additional CSS Files -->

<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

<link rel="stylesheet" href="assets/css/hexashop.css">



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">



    <title>Ajouter Catégories</title>
    <style>
     
     @import url('https://fonts.googleapis.com/css2?family=Arvo:ital@1&display=swap');
     *{
  margin: 0;
  padding: 0;
  font-family: 'Arvo', serif;
  

}
.chose {
  text-decoration: none;
  padding: 30px;
  color: #f9f9f9;
  border-radius: 25px;
  
}
.chose:hover{
 
  background-color: #8e8a8a47;
 
}
.active{
  background-color: #8e8a8a47;

}


body{
  background-color: #495057;

}
.progress-title {
    font-size: 16px;
    font-weight: 700;
    color: #333;
    margin: 0 0 20px
}

.progress {
    height: 20px;
    background: #333;
    border-radius: 0;
    box-shadow: none;
    margin-bottom: 30px;
    overflow: visible
}

.progress .progress-bar {
    position: relative;
    -webkit-animation: animate-positive 2s;
    animation: animate-positive 2s
}

.progress .progress-value {
    display: block;
    font-size: 18px;
    font-weight: 500;
    color: #ee9191;
    position: absolute;
    top: -37px;
    right: 9px
}

.progress .progress-bar:after {
    content: "";
    display: inline-block;
    width: 10px;
    background: #fff;
    position: absolute;
    top: -10px;
    bottom: -10px;
    right: -5px;
    z-index: 1;
    transform: rotate(35deg)
}





.progress-title{
    font-size: 18px;
    font-weight: 700;
    color: #000;
    letter-spacing: 2px;
    margin: 0 0 15px;
}
.progress{
    height: 26px;
    background: rgba(0,0,0,0.1);
    border-radius: 0;
    box-shadow: none;
    margin-bottom: 40px;
    overflow: visible;
    position: relative;
}
.progress .progress-bar{
    box-shadow: none;
    border-radius: 0;
    position: relative;
    -webkit-animation: 2s linear 0s normal none infinite running progress-bar-stripes,animate-positive 1s;
    animation: 2s linear 0s normal none infinite running progress-bar-stripes,animate-positive 1s;
}
.progress-bar .progress-value{
    width: 50px;
    height: 100%;
    background: #000;
    font-size: 15px;
    font-weight: 600;
    color: #fff;
    position: absolute;
    line-height: 27px;
    top: 0;
    left: 0;
}
.progress:after,
.progress .progress-bar:after,
.progress .progress-value:after{
    content: "";

    position: absolute;
    top: 0;
    right: -13px;
}
.progress.red .progress-bar:after{ border-left-color: #d9534f; }
.progress .progress-value:after{ border-left: 13px solid #000; }
.progress.blue .progress-bar:after{ border-left-color: #5bc0de; }
.progress.yellow .progress-bar:after{ border-left-color: #f0ad4e; }
.progress.green .progress-bar:after{ border-left-color: #5cb85c; }
@-webkit-keyframes animate-positive{
    0%{ width: 0; }
}
@keyframes animate-positive{
    0%{ width: 0; }
}

</style>
</head>
<body>

<?php include 'Dashboard\layout_dashboard\navbar_dashboard.php' ?>
  <div class="page-dashboard" id="top">


  <div class=" text-center ">
        <div class="row">
          <div class="col-sm-12 bg-black p-4 " >
         
          <a class="mb-5 chose active"  href="Home.php">Home</a>

          <a class="mb-5 chose"  href="dashboard_Categories.php">Ajouter Catégories</a>
        
          <a class="mb-5 chose"  href="dashboard_Products.php">Ajouter Produits</a>
        
          <a class="mb-5 chose"  href="dashboard_Admins.php">Liste des Admins</a>

          <a class="mb-5 chose"  href="dashboard_order.php">Liste des orders</a>

                 
        
          
          </div>
          <div class="col-sm-12 " style=" min-height: 800px;" >
            <div class="row container-fluid ">
              <h1 class="mt-5 ms-5 text-white  text-start ">Dashboard the Admin</h1>
        
            <div  class=" col-xl-6    text-light ">

            <div class="container mt-4 ms-2">
    <div class="row mt-12">
        <div class="col-md-12 text-start ">
            <h3 class="progress-title text-white "><a class="btn btn-outline-info p-2" href="dashboard_Admins.php">Liste des Admins</a></h3>
            <div class="progress red">
            <div class="progress-value"><?= $numAdminData ?></div>
                <div class="progress-bar progress-bar-danger progress-bar-striped " style="width:<?= $numAdminData ?>%;">
                   
                </div>
               
            </div>
            <h3 class="progress-title  "><a class="btn btn-outline-info p-2" href="dashboard_Categories.php"  >Liste des Catégories </a></h3>
            <div class="progress red">
            <div class="progress-value"><?= $numcategorie?></div>
                <div class="progress-bar progress-bar-danger progress-bar-striped " style="width:<?= $numcategorie?>%;">
                   
                </div>
            </div>
            <h3 class="progress-title  text-white "><a class="btn btn-outline-info p-2" href="dashboard_order.php">Liste des Produits En Attente de Confirmation</a></h3>
            <div class="progress blue">
            <div class="progress-value"><?= $commandeData ?></div>
                <div class="progress-bar progress-bar-info progress-bar-striped " style="width:<?= $commandeData ?>%;">
                   
                </div>
            </div>
          
        </div>
    </div>
</div>

                </div>
                <div  class=" col-xl-6   text-light ">
          
                <div class="container mt-4 ms-2">
    <div class="row mt-12">
        <div class="col-md-12 text-start ">
        <h3 class="progress-title  text-white "><a class="btn btn-outline-info p-2" href="dashboard_Admins.php">Liste des Client</a></h3>
            <div class="progress blue">
            <div class="progress-value"><?= $numUsersData ?></div>
                <div class="progress-bar progress-bar-info progress-bar-striped " style="width:<?= $numUsersData ?>%;">
                   
                </div>
            </div>

        
            <h3 class="progress-title  text-white "><a class="btn btn-outline-info p-2" href="dashboard_Products.php">Liste des Produits</a></h3>
            <div class="progress blue">
            <div class="progress-value"><?= $numproduit?></div>
                <div class="progress-bar progress-bar-info progress-bar-striped " style="width:<?= $numproduit?>%;">
                  
                </div>
            </div>

            <h3 class="progress-title  text-white "><a class="btn btn-outline-info p-2" href="dashboard_order.php">Liste des Produits shipped</a></h3>
            <div class="progress blue">
            <div class="progress-value"><?= $commandeData1?></div>
                <div class="progress-bar progress-bar-info progress-bar-striped " style="width:<?= $commandeData1?>%;">
                  
                </div>
            </div>
      
          
        </div>
    </div>
</div>
          </div>

               
          </div>
        </div>
       
      </div>
      </div>
    

<?php include 'layout/js.php' ; ?>



</body>
</html>

<?php }   ?>
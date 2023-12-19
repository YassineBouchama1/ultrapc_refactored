<?php 
session_start();


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
.label_file {
	display: block;
	width: 60vw;
	max-width: 300px;
 

	background-color: slateblue;
	border-radius: 2px;
	font-size: 1em;
	line-height: 2.5em;
	text-align: center;
}

.label_file:hover {
	background-color: cornflowerblue;
}

.label_file:active {
	background-color: mediumaquamarine;
}

#apply {
	border: 0;
    clip: rect(1px, 1px, 1px, 1px);
    height: 1px; 
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
   
}

.alert{
  border: none !important;
  --bs-alert-border-radius: n;
  border-radius: 40px 0px;

}
</style>
</head>
<body>

<?php include 'Dashboard\layout_dashboard\navbar_dashboard.php' ?>
  <div class="page-dashboard" id="top">


  <div class=" text-center ">
        <div class="row">
          <div class="col-sm-12 bg-black p-4 " >

          <a class="mb-5 chose"  href="Home.php">Home</a>
         
          <a class="mb-5 chose"  href="dashboard_Categories.php">Ajouter Catégories</a>
        
          <a class="mb-5 chose"  href="dashboard_Products.php">Ajouter Produits</a>
        
          <a class="mb-5 chose active"  href="dashboard_Admins.php">Liste des Admins</a>

          <a class="mb-5 chose"  href="dashboard_order.php">Liste des orders</a>

                 
        
          
          </div>
          <div class="col-sm-12 " style=" min-height: 1000px;" >
            <div class="row container-fluid ">
            <div id="shawdata" class=" col-sm-6  pt-4  text-light text-start table-responsive">

              <!-- table the admins -->
          
                </div>
                <div id="shawdata1" class=" col-sm-6  pt-4  text-light text-start table-responsive">

                   <!-- table the Utilisateurs -->
            
                </div>

          </div>
        </div>
      </div>
      </div>
    

<?php include 'layout/js.php' ; ?>
<script>
  // Function to perform XHR request and update the table
  function fetchDataAndUpdateTable(url, tableId) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);

    xhr.onload = function() {
      if (xhr.status >= 200 && xhr.status < 300) {
        document.getElementById(tableId).innerHTML = xhr.responseText;
    

       
      } else {
        console.error('Request failed with status ' + xhr.status);
      }
    };

    xhr.onerror = function() {
      console.error('Request failed');
    };

    xhr.send();
  }
  

  // Fetch data for admins and update the table
  fetchDataAndUpdateTable("Admins_select.php", "shawdata");

  // Fetch data for users and update the table
  fetchDataAndUpdateTable("Utilisateurs_select.php", "shawdata1");

  
</script>
<script>

  function makeRequest(id ,url) { 
  var xhr = new XMLHttpRequest();
  console.log(url);
  console.log(id);
  xhr.open('GET', `${url}` + id, true);

  xhr.onload = function() {
    if (xhr.status >= 200 && xhr.status < 300) {

      fetchDataAndUpdateTable("Utilisateurs_select.php", "shawdata1");

      fetchDataAndUpdateTable("Admins_select.php", "shawdata");

     

     
    } else {
      console.error('Request failed');
    }
  };

  xhr.onerror = function() {
    console.error('Request failed');
  };

  xhr.send();
}
</script>
<script>
  function AcceptRequest(id) {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', "Dashboard/Accept_Visiteurs.php?id=" + id, true);

  xhr.onload = function() {
    if (xhr.status >= 200 && xhr.status < 300) {
     
      fetchDataAndUpdateTable("Utilisateurs_select.php", "shawdata1");

      fetchDataAndUpdateTable("Admins_select.php", "shawdata");



     
    } else {
      console.error('Request failed');
    }
  };

  xhr.onerror = function() {
    console.error('Request failed');
  };

  xhr.send();
}
</script>


</body>
</html>

<?php }   ?>
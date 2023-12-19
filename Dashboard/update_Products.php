<?php 
        session_start();
        include '../backend/DataBase.php';
        $Database = new Database();

$id = $_GET["id"] ;



$categorieData =  $Database->selectData('categorie','*',"","");


$produitData =  $Database->selectData('produit','*',"Reference = $id","");


if (isset($_POST["submit"])) {

  $etiquette = $_POST['Etiquette'];
  $code = $_POST['Code'];
  $description = $_POST['Description'];
  $prixAchat = $_POST['PrixAchat'];
  $prixFinal = $_POST['PrixFinal'];
  $offreDePrix = $_POST['OffreDePrix'];
  $quantiteMin = $_POST['QuantiteMin'];
  $quantiteStock = $_POST['QuantiteStock'];
  $categories = $_POST['Categories'];


     // Check if file was uploaded without errors
     if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
      $uploadDir = "photo_Products/"; // Directory where you want to save the uploaded images

             // Get file extension
             $fileExtension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        
             // Generate a unique filename
             $uniqueFilename = uniqid('image_', true) . '.' . $fileExtension;
     
             $uploadedFile = $uploadDir . $uniqueFilename;
      
      
         
      
      // Move the uploaded file to the specified directory
      if (!move_uploaded_file($_FILES["image"]["tmp_name"], $uploadedFile)) {
        $error_file = "Error uploading the image.";
        $color = "danger";
      } else {
        $uploadedFil = 'Dashboard/' . $uploadedFile;

      }
  } else {
    $uploadedFil =  $produitData[0]["img"] ;
  }
  if (!empty($etiquette) && !empty($code)  && !empty($description)  && !empty($prixAchat)  && !empty($prixFinal)   ) {

    if (!empty($uploadedFil)) {


      $sql = "UPDATE `produit` SET `Etiquette`='$etiquette', `Code à barres`='$code', `PrixAchat`='$prixAchat', `img`='$uploadedFil', `PrixFinal`='$prixFinal', `OffreDePrix`='$offreDePrix', `Description`='$description', `QuantiteMin`='$quantiteMin', `QuantiteStock`='$quantiteStock', `CategorieID`='$categories' WHERE Reference='$id'";

      $Database->updateData($sql);

  
      header("Location: ../dashboard_Products.php");
      exit; 
  

 
    }


 

  }else {
    $error_input = "Nom and Description are required.";
    $color = "danger";
  }   
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

<title>Ajouter Catégories</title>


<!-- Additional CSS Files -->

<link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">

<link rel="stylesheet" href="../assets/css/hexashop.css">



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">



<style>

@import url('https://fonts.googleapis.com/css2?family=Arvo:ital@1&display=swap');
*{
margin: 0;
padding: 0;
font-family: 'Arvo', serif;


}
.chose a{
text-decoration: none;
padding: 20px 30px !important;
color: #f9f9f9;
border-radius: 25px;

}
.chose a:hover{

background-color: #8e8a8a47;

}
.active{
background-color: #8e8a8a47;

}
/* .width{
width: 21% !important;
} */

.form{
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
.img{
width: 450px !important;
height: 250px !important;
}


</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light fixed-top " style="background-color: #f9f9f9;">
<div class="container-fluid">
<a href="login.php" class="navbar-brand ms-5" >
                <img src="assets\images\logo_1.png">
            </a>

<button class="navbar-toggler" style="margin-right:5px !important;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
          <span class="navbar-toggler-icon"></span>
        </button>
<div class="collapse navbar-collapse top_nav" id="navbarSupportedContent">
<ul class="navbar-nav mx-auto ">

</ul>
<ul class="navbar navbar-nav navbar-right" style="display:flex;">
                                                                
  <li class="nav-item me-4"><a class="nav-link <?php if ($isActive === "login.php") echo ' activee'; ?>" href="login.php" >Products</a></li>
</ul>
</ul>
</div>
</div>
</nav>
<div class="page-dashboard" id="top">


<div class=" text-center ">
<div class="row">

  <div class="col-sm-12 form">
    <div class="row">
   
      <div class="col-12 col-sm-12  p-5 text-light text-start">
      <form method="post" enctype="multipart/form-data">
           <div class="row  ">
           <div class="col-6 mb-4">
                <label for="exampleFormControlInput1" class="form-label ">Etiquette</label>
                <input type="text" value="<?= $etiquette ?? $produitData[0]["Etiquette"]   ?>" class="form-control" name="Etiquette" id="exampleFormControlInput1" placeholder="name..." >
              </div>
              <div class="col-6">
                <label for="exampleFormControlInput1" class="form-label ">Code à barres	</label>
                <input type="text" class="form-control  " value="<?php   echo $code ?? $produitData[0]["Code à barres"]  ?>" name="Code" id="exampleFormControlInput1" >
              </div>
              <div class="mb-4 col-12 ">
                <label for="exampleFormControlTextarea1" class="form-label  ">Description	</label>
                <textarea placeholder="Description..." class="form-control" name="Description" id="exampleFormControlTextarea1" rows="3"><?php   echo $description ?? $produitData[0]["Description"]  ?></textarea>
              </div> 
              <div class="row justify-content-center ">
              <div class="col-lg-2  mb-4">
                <label for="exampleFormControlInput1" class="form-label ">PrixAchat</label>
                <input type="number" class="form-control " value="<?php   echo $prixAchat ?? $produitData[0]["PrixAchat"]  ?>" name="PrixAchat" id="exampleFormControlInput1" >
              </div>
              <div class=" col-lg-2 mb-4">
                <label for="exampleFormControlInput1" class="form-label ">PrixFinal</label>
                <input type="number" class="form-control " value="<?php   echo $prixFinal ?? $produitData[0]["PrixFinal"]  ?>" name="PrixFinal" id="exampleFormControlInput1" >
              </div>
              <div class="col-lg-2 mb-4">
                <label for="exampleFormControlInput1" class="form-label ">OffreDePrix</label>
                <input type="number" class="form-control "  value="<?php   echo $offreDePrix ?? $produitData[0]["OffreDePrix"] ?>" name="OffreDePrix" id="exampleFormControlInput1" >
              </div>
             
              <div class="col-lg-2 mb-4">
                <label for="exampleFormControlInput1" class="form-label ">QuantiteMin</label>
                <input type="number" class="form-control "  value="<?php   echo $quantiteMin ?? $produitData[0]["QuantiteMin"] ?>" name="QuantiteMin" id="exampleFormControlInput1" >
              </div>
              <div class="col-lg-2 mb-4">
                <label for="exampleFormControlInput1" class="form-label ">QuantiteStock</label>
                <input type="number" class="form-control "  value="<?php   echo $quantiteStock ?? $produitData[0]["QuantiteStock"] ?>" name="QuantiteStock" id="exampleFormControlInput1" >
              </div>
              </div>
              <div class="col-lg-3 mb-4">
              <label for="exampleFormControlTextarea1" class="form-label">Categories</label>
              <select class="form-select" name="Categories" aria-label="Default select example">
              
                <?php   $CategorieID  = $produitData[0]['CategorieID']; ?>
                <?php 
                        $categorie =  $Database->selectData('categorie','*',"id = $CategorieID","","1");

                       
                        ?>
                <option value="<?= $categorie["id"] ?>" selected><?= $categorie["Nom"]?></option>
                <?php foreach ($categorieData as  $value2) {    ;
                  
                    if ($value2["Nom"] ===$categorie["Nom"]) 
                   continue;
                 
                  ?>
                   
               


              

                <option  value="<?= $value2["id"] ?>"><?= $value2["Nom"] ?></option>
               
                <?php   }  ?>
              </select>
              </div>
              </div>
            
              <!-- <div>
                <label for="formFileLg" class="form-label">add photo</label>
                <input class="form-control form-control-lg" id="formFileLg" type="file">
              </div> -->
          
             <label class="mb-2" for="apply">add img</label>
             <div class="row justify-content-start ">
             <div class="row g-0 text-center  ms-1">
           <div class=" col-xl-6">  <label class="label_file col-sm-4" for="apply"><input type="file"  name="image" id="apply" accept="image/*">Get file</label></div>
           <div class=" col-xl-6 mt-4"> <img src="../<?= $produitData[0]["img"] ?>" alt="" width="180px" height="190px" >  </div>
             </div>             </div>
             <?php if (isset($error_file , $_POST['submit'])  ) { ?>
                        <div class="alert alert-<?= $color ?> mt-4" role="alert">
                            <?php echo $error_file; ?>
                        </div> 

                    <?php    } ?> 
             <?php if (isset($error_input , $_POST['submit'])  ) { ?>
                        <div class="alert alert-<?= $color ?> mt-4" role="alert">
                            <?php echo $error_input; ?>
                        </div> 

                    <?php    } ?> 
           
             <div class="mt-5">
             <button type="submit" name="submit" class="btn btn-success">Update Produits</button>
             </div>
             </form> 
      </div>
    
    </div>

  </div>
</div>
</div>
</div>





<?php include '../layout/js.php' ; ?>

</body>
</html>
        <?php 
        session_start();
        include '../backend/DataBase.php';
    
        
        $data = new categoriesDAO() ; 
        $Database = new Database() ; 

        $id = $_GET["id"] ; 

    

        $categorieData = $data->getcategories('*',"id = $id",'') ; 
               



        ?>


            <?php 
            if (isset($_POST['submit'])) {
            // Retrieve form data
            $Nom_Catégories = $_POST['Nom_Catégories'];
            $Description = $_POST['Description'];

   // Check if file was uploaded without errors
   if (!empty($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
      $uploadDir = "photo_Catégories/"; // Directory where you want to save the uploaded images

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
                    $uploadedFil =  $categorieData[0]->getImg() ;
                    
                }
      
      
         
      

            if (!empty($Nom_Catégories) && !empty($Description) ) {

                if (!empty($uploadedFil)) {

                $sql = "UPDATE `categorie` SET `Nom`='$Nom_Catégories',`Description`='$Description',`img`='$uploadedFil' WHERE id = $id";
           

                
                 $sbm = $Database->updateData($sql) ;
                $error_input = "yes";
                $color = "success";
                header("Location: ../dashboard_Categories.php");
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
              <form  method="post" enctype="multipart/form-data">
              <div class="col-12 col-sm-12  p-5 text-light text-start">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label ">Nom de Catégories</label>
                <input name="Nom_Catégories" value="<?php   echo $Nom_Catégories ?? $categorieData[0]->getNom()  ?>" placeholder="nom..." type="text" class="form-control " id="exampleFormControlInput1" >
              </div>
              <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label  ">Description</label>
                <textarea name="Description"  placeholder="Description..." class="form-control" id="exampleFormControlTextarea1" rows="3"><?php   echo $Description ??  $categorieData[0]->getDescription()   ?></textarea>
              </div> 
              <label class="mb-2" for="">add img</label>
             <div class="row g-0 text-center  ms-1">
           <div class=" col-xl-6">  <label class="label_file col-sm-4" for="apply"><input type="file"  name="image" id="apply" accept="image/*">Get file</label></div>
           <div class=" col-xl-6 mt-4"> <img src="../<?= $categorieData[0]->getImg() ?>" alt="" width="180px" height="190px" >  </div>
             </div>
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
             <button type="submit" name="submit" class="btn btn-success">update Catégories</button>
          <?php   
          ?>
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
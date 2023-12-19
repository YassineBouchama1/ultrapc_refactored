<?php 
session_start();
include 'backend/DataBase.php';

$data = new categoriesDAO() ; 
$dataproducts = new ProductsDAO() ; 



 if ( !empty($_SESSION["admin"])) {  

  $categorieData = $data->getcategories() ; 








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


     if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
      $uploadDir = "Dashboard/photo_Products/";

           
             $fileExtension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        
          
             $uniqueFilename = uniqid('image_', true) . '.' . $fileExtension;
     
             $uploadedFile = $uploadDir . $uniqueFilename;
      
      
         
      
      // Move the uploaded file to the specified directory
      if (!move_uploaded_file($_FILES["image"]["tmp_name"], $uploadedFile)) {
        $error_file = "Error uploading the image.";
        $color = "danger";
      } 
  } else {
    $error_file = "Invalid file upload. Please select an image.";
    $color = "danger";
  }
  if (!empty($etiquette) && !empty($code)  && !empty($description)  && !empty($prixAchat)  && !empty($offreDePrix) && !empty($prixFinal) && !empty($quantiteMin) && !empty($quantiteStock) && $categories !== "null"   ) {

    if (!empty($uploadedFile)) {
 

 
      
        $productsD = new productsDAO() ; 


        $newproduct = new product("",$etiquette,$code ,$prixAchat,$uploadedFile,$prixFinal,$offreDePrix,$description,$quantiteMin,$quantiteStock,$categories ,null) ; 
        $productsD->Createproduct($newproduct);
      
       
  
      $error_input = "yes";
      $color = "success";
      $etiquette = "";
      $description = "";
      $prixAchat = "";
      $prixFinal = "";
      $offreDePrix = "";
      $quantiteMin = "";
      $quantiteStock = "";
      $code = "";
  

  
    }


 

  }else {
    $error_input = "All input are required.";
    $color = "danger";
  }   
}

$produitData = $dataproducts->getproducts() ; 

?>

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
       
        
         <a class="mb-5 chose active"  href="dashboard_Products.php">Ajouter Produits</a>
       
         <a class="mb-5 chose "  href="dashboard_Admins.php">Liste des Admins</a>

         <a class="mb-5 chose"  href="dashboard_order.php">Liste des orders</a>

       
        
       
         
         </div>
          <div class="col-sm-12 form">
            <div class="row">
            <div class="col-12 col-sm-12  p-5 text-light text-start">
            <form method="post" enctype="multipart/form-data">
           <div class="row  ">
           <div class="col-6 mb-4">
                <label for="exampleFormControlInput1" class="form-label ">Etiquette</label>
                <input type="text" class="form-control" value="<?php   echo $etiquette ?? '';  ?>" name="Etiquette" id="exampleFormControlInput1" placeholder="name..." >
              </div>
              <div class="col-6">
                <label for="exampleFormControlInput1" class="form-label ">Code à barres	</label>
                <input type="text" class="form-control  " value="<?php   echo $code ?? '';  ?>" name="Code" id="exampleFormControlInput1" >
              </div>
              <div class="mb-4 col-12 ">
                <label for="exampleFormControlTextarea1" class="form-label  ">Description	</label>
                <textarea placeholder="Description..." class="form-control" name="Description" id="exampleFormControlTextarea1" rows="3"><?php   echo $description ?? '';  ?></textarea>
              </div> 
              <div class="row justify-content-center ">
              <div class="col-lg-2  mb-4">
                <label for="exampleFormControlInput1" class="form-label ">PrixAchat</label>
                <input type="number" class="form-control " value="<?php   echo $prixAchat ?? '';  ?>" name="PrixAchat" id="exampleFormControlInput1" >
              </div>
              <div class=" col-lg-2 mb-4">
                <label for="exampleFormControlInput1" class="form-label ">PrixFinal</label>
                <input type="number" class="form-control " value="<?php   echo $prixFinal ?? '';  ?>" name="PrixFinal" id="exampleFormControlInput1" >
              </div>
              <div class="col-lg-2 mb-4">
                <label for="exampleFormControlInput1" class="form-label ">OffreDePrix</label>
                <input type="number" class="form-control "  value="<?php   echo $offreDePrix ?? '';  ?>" name="OffreDePrix" id="exampleFormControlInput1" >
              </div>
             
              <div class="col-lg-2 mb-4">
                <label for="exampleFormControlInput1" class="form-label ">QuantiteMin</label>
                <input type="number" class="form-control "  value="<?php   echo $quantiteMin ?? '';  ?>" name="QuantiteMin" id="exampleFormControlInput1" >
              </div>
              <div class="col-lg-2 mb-4">
                <label for="exampleFormControlInput1" class="form-label ">QuantiteStock</label>
                <input type="number" class="form-control "  value="<?php   echo $quantiteStock ?? '';  ?>" name="QuantiteStock" id="exampleFormControlInput1" >
              </div>
              </div>
              <div class="col-lg-3 mb-4">
              <label for="exampleFormControlTextarea1" class="form-label">Categories</label>
              <select class="form-select" name="Categories" aria-label="Default select example" required>
                <option value="null" selected>Choose Categories</option>
                <?php foreach ($categorieData as  $value) {    ;?>

                <option value="<?=  $value ->getId() ?>"><?= $value ->getNom() ?></option>
               
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
             <div class="col-6 col-xl-4">  <label class="label_file col-sm-4" for="apply"><input type="file"  name="image" id="apply" accept="image/*">Get file</label></div>
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
             <button type="submit" name="submit" class="btn btn-success">Ajouter Produits</button>
             </div>
             </form> 

              </div>
            
            </div>
            <div class="row">
            <div class="col-12 col-sm-12  p-5 text-light text-start table-responsive">
            <label for="" class="form-label mb-4 ">Liste des Produits : </label>
            <table class="table table-striped table-hover " >
                <thead >
                    <tr>
                    <th  scope="col">photo</th>
                    <th  scope="col">Etiquette</th>
                    <th  scope="col">Description</th>
                    <th  scope="col">Code à barres</th>
                    <th  scope="col">PrixAchat</th>
                    <th  scope="col">PrixFinal</th>
                    <th  scope="col">OffreDePrix</th>
                    <th  scope="col">QuantiteMin</th>
                    <th  scope="col">QuantiteStock</th>
                    <th  scope="col">Categories</th>
                    <th  scope="col">Opérations</th>
                 
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                <?php foreach ($produitData as $value) {     
    $CategorieID = $value->getCategorieID();
 
    $categorie = $data->getcategories('*', "id = $CategorieID", '') ; 

?>
    <tr>
        <td><img src="<?= $value->getImg() ?>" alt="" width="150px" height="154px"></td>
        <th scope="row"><?= $value->getEtiquette() ?></th>
        <th scope="row"><?= $value->getDescription() ?></th>
        <th scope="row"><?= $value->getCodeBarres() ?></th>
        <td><?= $value->getPrixAchat() ?></td>
        <td><?= $value->getPrixFinal() ?></td>
        <td><?= $value->getOffreDePrix() ?></td>
        <td><?= $value->getQuantiteMin() ?></td>
        <td><?= $value->getQuantiteStock() ?></td>
        <td><?= $categorie[0]->getNom() ?></td>
        <td>
            <a class="btn btn-success mb-2 ms-2" href="Dashboard/update_Products.php?id=<?= $value->getReference() ?>">update</a>
            <button onclick="NoneRequest(<?= $value->getReference() ?>, this)" class="btn btn-<?php if (is_null($value->getDeletedAt())) {
                echo "info";
            } else {
                echo "secondary";
            } ?> mb-2 ms-2" type="button">
                <div id="result_<?= $value->getReference() ?>">
                    <?php if (is_null($value->getDeletedAt())) {
                        echo "None";
                    } else {
                        echo "Block";
                    } ?>
                </div>
            </button>
            <a class="btn btn-danger mb-2 ms-2 modal-trigger" data-bs-toggle="modal" data-bs-id="<?= $value->getReference() ?>" data-bs-name="<?= $value->getEtiquette() ?>" href="#">delete</a>
        </td>
    </tr>
<?php } ?>

             
              
                </tbody>
                </table>

            
            </div>
          </div>
          </div>
        </div>
      </div>
      </div>
    
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">delete Products</h1>
      </div>
      <div class="modal-body">
       
      </div>
      <div class="modal-footer">

        
      </div>
    </div>
  </div>
</div>
<?php include 'layout/js.php' ; ?>
<script>
  function NoneRequest(id, button) {
  console.log(button.classList) ;
  console.log(id) ;
  var xhr = new XMLHttpRequest();
  xhr.open('GET', "Dashboard/masquer_Products.php?id=" + id, true);

  xhr.onload = function() {
    if (xhr.status >= 200 && xhr.status < 300) {
     
        // Toggle the button text between 'None' and 'Block'
        const buttonText = button.querySelector('#result_' + id);
       
        if (buttonText.innerHTML === 'None') {
        
          buttonText.innerHTML = 'Block';
          button.classList.remove('btn-info');
          button.classList.add('btn-secondary');
        } else {
          buttonText.innerHTML = 'None';
          button.classList.remove('btn-secondary');
          button.classList.add('btn-info');
        }
     
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
    // JavaScript to handle modal trigger click event and set the modal target dynamically
    const modalTriggers = document.querySelectorAll('.modal-trigger');
    modalTriggers.forEach((trigger) => {
        trigger.addEventListener('click', (event) => {
            event.preventDefault();
            const id = trigger.getAttribute('data-bs-id');
            const nom = trigger.getAttribute('data-bs-name');
            const modal = document.getElementById('exampleModal');
            const body = modal.querySelector('.modal-body');
            const modalTrigger = modal.querySelector('.modal-footer');
            // Use the fetched 'id' to perform further actions or data retrieval
            modalTrigger.innerHTML = `<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <a class="btn btn-primary" href="Dashboard/delete_Products.php?id=${id}">delete</a>`;
            body.innerHTML = `Do you want to delete : ${nom}`;
            // Set the 'data-bs-target' attribute of the modal dynamically
            modal.setAttribute('data-bs-target', `#exampleModal?id=${id}`);
            // Show the modal
            const myModal = new bootstrap.Modal(modal);
            myModal.show();
        });
    });
</script>
</body>
</html>


<?php }   ?>
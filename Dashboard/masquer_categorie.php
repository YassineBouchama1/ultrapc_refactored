<?php

session_start();
include '../backend/DataBase.php';
$Database = new Database();


 $id = $_GET["id"] ;
 $timee = date("Y/m/d H:i:s");




 $categorieData = $Database->selectData('categorie','*',"id = $id",'');



     if (empty($categorieData[0]["deleted_at"])) {
         // Update the 'deleted_at' field with the current timestamp

         $sql = "UPDATE categorie SET deleted_at = '$timee' WHERE id = $id";
         $Database->updateData($sql);
    

         $sql = "UPDATE produit SET deleted_at = '$timee' WHERE CategorieID = $id";
         $Database->updateData($sql);

     } else {
       

         $sql = "UPDATE categorie SET deleted_at = NULL WHERE id = $id";
         $Database->updateData($sql);

     


         $sql = "UPDATE produit SET deleted_at = NULL WHERE CategorieID = $id";
         $Database->updateData($sql);
         
     }




// header("Location: ../dashboard_Categories.php");
// exit; 




?>

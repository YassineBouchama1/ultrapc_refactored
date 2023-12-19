<?php
session_start();
include '../backend/DataBase.php';
$Database = new Database();

 $id = $_GET["id"] ;
 $timee = date("Y/m/d H:i:s");



 $produitData = $Database->selectData('produit','*',"Reference = $id",'');




     if (empty($produitData[0]["deleted_at"])) {
    

         $sql = "UPDATE produit SET deleted_at = '$timee' WHERE Reference = $id";
         $Database->updateData($sql);
     } else {
     
         
         $sql = "UPDATE produit SET deleted_at = NULL WHERE Reference = $id";
         $Database->updateData($sql);
     }



// header("Location: ../dashboard_Categories.php");
// exit; 




?>

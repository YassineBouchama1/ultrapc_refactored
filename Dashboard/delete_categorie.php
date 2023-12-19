<?php 
session_start();
include '../backend/DataBase.php';

$data = new categoriesDAO() ; 



 $id = $_GET["id"] ;

 $data->deletecategorie("id = $id") ;



header("Location: ../dashboard_Categories.php");
exit; 




?>

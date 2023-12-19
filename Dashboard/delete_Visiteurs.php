<?php 
 session_start();
 include '../backend/DataBase.php';



 $id = $_GET["id"] ;

 $data = new Users() ; 

 $data->deleteUser('users',"id = $id") ;




?>

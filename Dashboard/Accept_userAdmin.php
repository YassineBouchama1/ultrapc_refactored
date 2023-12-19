<?php 
 session_start();
 include '../backend/DataBase.php';
 $id = $_GET["id"] ;
 $data = new Users() ; 

 $UsersData = $data->getUsers('*',"id = $id",'') ;









$Email = $UsersData[0]->getEmail() ;
$Password = $UsersData[0]->getPassword() ;


$dataAdmin = new adminDAO() ; 


$newUser = new admin("",$Email,$Password ,"0") ; 

$dataAdmin->Createadmin($newUser);


 $data->deleteUser('users',"id = $id") ;




?>
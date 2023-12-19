<?php
session_start();
include '../DataBase.php';
$Database = new Database();


if (isset($_GET["op"]) && isset($_GET["id_product"]) && !empty($_SESSION["user"])) {
    $op = $_GET["op"];
    $id_product = $_GET["id_product"];
    $user_id = $_SESSION["user"];

    // Prepare and execute the SELECT query using prepared statements
 

    $panierData =  $Database->selectData('panier','*',"client_id = $user_id AND panier_id = $id_product",'',"1");


    if (!empty($panierData)) {
        $currentStock = $panierData['Stock'];
        $QuantiteStock = $panierData['QuantiteStock'];
        // && $currentStock < $QuantiteStock

        // Update the stock based on the operation received
        if ($op == 1 ) {
            $currentStock += 1;
          
        } else if ($op == 0 && $currentStock > 1) {
            $currentStock -= 1;
           
        }

        // Prepare and execute the UPDATE query using prepared statements
     

        $sql = "UPDATE panier SET `Stock` = '$currentStock' WHERE panier_id = '$id_product'";

          $Database->updateData($sql);
} 
}
?>

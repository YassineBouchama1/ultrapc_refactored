<?php include '../layout/coon.php';


if (isset($_SESSION['id_pro'] )) {
   $id = $_SESSION['id_pro'] ;

   $produit_result = $conn->query("SELECT * FROM `produit` WHERE Reference = $id");
   $produitData = $produit_result->fetch(PDO::FETCH_ASSOC);
 $Etiquette =   $produitData["Etiquette"] ;
 $user_id = $_SESSION["user"] ;
// Construct the query with placeholders to prevent SQL injection
$query = "SELECT * FROM `panier` WHERE client_id = :user_id AND Etiquette = :Etiquette";

// Prepare the statement
$panier_result = $conn->prepare($query);

// Bind parameters and execute the query
$panier_result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$panier_result->bindParam(':Etiquette', $Etiquette, PDO::PARAM_STR);
$panier_result->execute();

// Fetch all rows that match the criteria
$panierData = $panier_result->fetch(PDO::FETCH_ASSOC);

// Print or use the fetched data

if (isset($panierData)) {
   $combinedData = array(
      'produitData' => $produitData,
      'panierData' => $panierData
   
  );
  echo json_encode($combinedData);
}else {
   echo json_encode($produitData);
}
    // Combine product and panier data into a single associative array


  // Encode the combined data as JSON and output 
  

 
}



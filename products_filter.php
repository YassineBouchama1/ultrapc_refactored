<?php
include 'layout/coon.php';

if (isset($_GET['categories'])) {
    $categoryIDs = explode(',', $_GET['categories']);
    $placeholders = str_repeat('?, ', count($categoryIDs) - 1) . '?';
    
    // Prepare a parameterized query to select products based on selected categories
    $sql = "SELECT * FROM `produit` WHERE deleted_at IS NULL AND CategorieID IN ($placeholders)";
    $stmt = $conn->prepare($sql);
    $stmt->execute($categoryIDs);
    
    $filteredProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Process $filteredProducts as needed (e.g., return as JSON, HTML, etc.)
    // For demonstration, let's convert it to JSON
    echo json_encode($filteredProducts);
} else {
    // Handle if no categories are selected
    echo "No categories selected";
}
?>

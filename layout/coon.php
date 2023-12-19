<?php

$host = 'localhost';
$dbname = 'best_électroniques_2';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}


session_start();




?>

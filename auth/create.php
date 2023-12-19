<?php
include 'backend/DataBase.php'; 


// Validate data (you may want to add more validation)
$requiredFields = ['name', 'prénom', 'email', 'password', 'adresse', 'phone', 'ville'];

foreach ($requiredFields as $field) {
    if (!isset($_POST[$field])) {
        http_response_code(400);
        echo json_encode(array("error" => "Incomplete data. Missing field: {$field}", "status" => 400));
        exit;
    }
}

// Sample data to insert
$name = $_POST['name'];
$prenom = $_POST['prénom'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$adresse = $_POST['adresse'];
$ville = $_POST['ville'];
$password = $_POST['password']; // Hash your password before inserting
$is_active = 1;

try {
    // Check If Email Already Exists 
    $stmtEmailCheck = $conn->prepare("SELECT * FROM users WHERE Email = :email");
    $stmtEmailCheck->bindParam(':email', $email);
    $stmtEmailCheck->execute();

    $user = $stmtEmailCheck->fetch(PDO::FETCH_ASSOC);

    if ($user !== false && $email === $user['Email']) {
        http_response_code(401);
        echo json_encode(array("error" => "User already exists.", "status" => 401));
    } else {
        // SQL query to insert data into the table
        session_start();

            $data = new Users() ;

            $newUser = new User("",$name,$prenom,$phone,$email,$adresse,$ville,$password,$is_active) ; 
//creat user usieng class db
            $data->CreateUser($newUser);



        http_response_code(201);
        echo json_encode(array("message" => "User created successfully.", "status" => 201));
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(array("error" => "Unable to create user. " . $e->getMessage(), "status" => 500));
}

// Close database connection
$conn = null;
?>

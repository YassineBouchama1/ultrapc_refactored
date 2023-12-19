<!-- <?php

// include '../../../layout/coon.php';
// // include '../../DataBase.php';
// class AuthHandler {

// private $db;

// public function __construct() {
//     $this->db = $conn;
//     $dbInstance = Database::getInstance();
//         if ($dbInstance) {
//             $this->db = $dbInstance->getConnection();
//         } else {
//             $this->sendErrorResponse("Database connection error.", 500);
//         }


// }

// public function sendErrorResponse($message, $status) {
//     http_response_code($status);
//     echo json_encode(["error" => $message, "status" => $status]);
//     exit;
// }

// public function sendSuccessResponse($message, $status) {
//     http_response_code($status);
//     echo json_encode(["message" => $message, "status" => $status]);
// }

// public function loginUser() {


//     $requiredFields = ['email', 'password'];

//     foreach ($requiredFields as $field) {
//         if (!isset($_POST[$field])) {
//             $this->sendErrorResponse("Incomplete data. Missing field: {$field}", 400);
//         }
//     }

//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     if (empty($email) || empty($password)) {
//         $this->sendErrorResponse("Incomplete data. Missing email or password.", 400);
//     }

//     $admin_query = "SELECT * FROM admin WHERE  Email = '$email' AND Password = '$password'";
//     $admin_result = $this->db->query($admin_query);
//     $AdminData = $admin_result->fetch(PDO::FETCH_ASSOC);

//     $user_query = "SELECT * FROM users WHERE  Email = '$email' AND Password = '$password'";
//     $user_result = $this->db->query($user_query);
//     $userData = $user_result->fetch(PDO::FETCH_ASSOC);

//     if (!empty($AdminData)) {
//         $this->sendSuccessResponse("Admin Logined Successfully.", 201);
//         // header("Location: http://localhost/brief8/Home.php");
//         $_SESSION["admin"] = $AdminData["Email"];
//         exit();
//     } elseif (!empty($userData)) {
//         if (!empty($userData) && $userData["is_Active"] === 0) {
//             $this->sendErrorResponse("Hello {$userData['name']}, you must wait for your acceptance by the admin.", 402);
//         } elseif (!empty($userData) && $userData["is_Active"] === 1) {
//             $_SESSION["user"] = $userData["id"];
//             $this->sendSuccessResponse("User Logined Successfully", 202);
//             // header("Location: http://localhost/brief8/index.php");
//             exit();
//         }
//     } else {
//         $this->sendErrorResponse("Invalid email or password. Please try again.", 401);
//     }
// }
// }




// $authHandler = new AuthHandler();
// $authHandler->loginUser();


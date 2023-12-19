
<?php include 'layout/coon.php';
$isActive = 'login.php';

if (isset($_POST['sing_out'])) { 
  session_destroy();
  header("Location: login.php");
  
}
if ( !empty($_SESSION["user"]) ||  !empty($_SESSION["admin"])) {  
  header("Location: brief8refactore/", true);  
}

function sanitizeInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (isset($_POST['submit'])) {
  // Retrieve form data
$email =sanitizeInput($_POST['email']) ;
$password =sanitizeInput($_POST['password']) ;

if (isset($_POST['email']) && isset($_POST['password'])) {
 


// Check against admin table
$admin_query = "SELECT * FROM admin WHERE  Email = '$email' AND Password = '$password'";
$admin_result = $conn->query($admin_query);
$AdminData = $admin_result->fetch();


// Check against user table
$user_query = "SELECT * FROM users WHERE  Email = '$email' AND Password = '$password'";
$user_result = $conn->query($user_query);
$userData = $user_result->fetch();



if (!empty($AdminData)) {
  
    header("Location: Home.php");
    $_SESSION["admin"] = $AdminData["Email"];
    exit();
} else {
  // Invalid credentials
  $error_message = "Invalid email or password. Please try again.";
}

if (!empty($userData) && $userData["is_Active"] === 1) {
    
    header("Location: index.php");
    $_SESSION["user"] = $userData["id"];
    exit();
}else if (!empty($userData) && $userData["is_Active"] === 0) {

  $color = "warning" ;

  $error_message = "Hello " . $userData['name'] . " You must wait for your acceptance by the admin.";
}






else {
    // Invalid credentials
    $color = "danger" ;
    $error_message = "Invalid email or password. Please try again.";
}
} else{
  $color = "danger" ;
$error_message = "Email and password are required.";
}


}?>


<!DOCTYPE html>
<html lang="en">

     <?php    include 'layout/head.php'; ?>
     

    <body>
    

   <?php
   

   
   
   include 'layout/navbar.php' ;
   


   
   
   ?>


  
   <?php





      

   
   ?>

<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 ">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm pt-6">
    
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
  </div>
  <div id="error">
                  <?php if (isset($error_message , $_POST['submit'])  ) { ?>
                        <div class="alert alert-<?= $color ?> mt-2" role="alert">
                            <?php echo $error_message; ?>
                        </div> 
                        <?php    } ?> 
                  </div>
  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6"  method="POST">
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
        <div class="mt-2">
          <input value="<?php echo (isset($email)) ? $email : ''; ?>" id="email" name="email" type="email" autocomplete="email"  class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm font-medium leading-6 text-gray-900 ">Password</label>
         
        </div>
        <div class="mt-2">
          <input  id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 px-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div>
        <button name="submit" type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
      </div>
    </form>

    <p class="mt-10 text-center text-sm text-gray-500">
      Not a member?
      <a href="new_account.php" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Create Account</a>
    </p>
  </div>
</div>

    
   <?php include 'layout/footer.php' ; ?>

   <?php include 'layout/js.php' ; ?>



  </body>
</html>
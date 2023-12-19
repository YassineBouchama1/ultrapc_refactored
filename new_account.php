
<?php include 'layout/coon.php';
$isActive ="new_account.php";

if (isset($_POST['sing_out'])) { 
  session_destroy();
}
 if ( !empty($_SESSION["user"]) ||  !empty($_SESSION["admin"])) {  
  header("Location: brief8refactore/", true);  
}
?>


<!DOCTYPE html>
<html lang="en">

     <?php    include 'layout/head.php'; ?>
     

    <body class=" bg-gray-400">
   <?php include 'layout/navbar.php' ;?>
    



  


<div class="h-full bg-gray-400  my-8">
	<!-- Container -->
	<div class="mx-auto">
		<div class="flex justify-center px-6 py-12">
			<!-- Row -->
			<div class="w-full xl:w-3/4 lg:w-11/12 flex">
				<!-- Col -->
				<div class="w-full h-auto bg-gray-400 dark:bg-gray-800 hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"
					style="background-image: url('https://images.unsplash.com/photo-1597872200969-2b65d56bd16b?ixlib=rb-4.0.3&q=85&fm=jpg&crop=entropy&cs=srgb&dl=andy-holmes-EOAKUQcsFIU-unsplash.jpg&w=1920')"></div>
				<!-- Col -->
				<div class="w-full lg:w-7/12 bg-white dark:bg-gray-700 p-5 rounded-lg lg:rounded-l-none">
					<h3 class="py-4 text-2xl text-center text-gray-800 ">Create an Account!</h3>
                    <div id="created_yassine" class=" hidden p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 text-center" role="alert">
                    User created successfully!
</div>
                    <p class="text-xs italic text-red-500 text-center" id="error_msg"></p>
                    
					<form id="form_yassine" class="px-8 pt-6 pb-8 mb-4 bg-white dark:bg-gray-800 rounded">
						<div class="mb-4 md:flex md:justify-between">
							<div class="mb-4 md:mr-2 md:mb-0">
								<label class="block mb-2 text-sm font-bold text-gray-700 " for="firstName">
                                    First Name
                                </label>
								<input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700  border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="firstName"
                                    type="text"
                                    placeholder="First Name"
                                />
							</div>
							<div class="md:ml-2">
								<label class="block mb-2 text-sm font-bold text-gray-700 " for="lastName">
                                    Last Name
                                </label>
								<input
                                    class="w-full px-3 py-2 text-sm leading-tight text-gray-700  border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="lastName"
                                    type="text"
                                    placeholder="Last Name"
                                />
							</div>
						</div>
						<div class="mb-4">
							<label class="block mb-2 text-sm font-bold text-gray-700 " for="email">
                                Email
                            </label>
							<input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700  border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="email"
                                type="text"
                                placeholder="Email"
                            />
						</div>
					
							<div class="mb-4 ">
								<label class="block mb-2 text-sm font-bold text-gray-700 " for="password">
                                    Password
                                </label>
								<input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700  border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="password"
                                    type="password"
                                    placeholder="******************"
                                />
								
							</div>
							
                            <div class="mb-4">
							<label class="block mb-2 text-sm font-bold text-gray-700 " for="email">
                                Addresse
                            </label>
							<input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700  border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="address"
                                type="text"
                                placeholder="Address"
                            />
						</div>
                        <div class="mb-4 md:flex md:justify-between">
							<div class="mb-4 md:mr-2 md:mb-0">
								<label class="block mb-2 text-sm font-bold text-gray-700 " for="password">
                                    Phone
                                </label>
								<input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700  border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="phone"
                                    type="text"
                                    placeholder="063*****"
                                />
								
							</div>
							<div class="md:ml-2">
								<label class="block mb-2 text-sm font-bold text-gray-700 " for="c_password">
                                    City
                                </label>
								<input
                                    class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700  border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                    id="city"
                                    type="text"
                                    placeholder="safi..."
                                />
							</div>
						</div>
						
						<div class="mb-6 text-center">
							<button
                            onclick="onSubmit()"
                                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 dark:bg-blue-700  dark:hover:bg-blue-900 focus:outline-none focus:shadow-outline"
                                type="button"
                            >
                                Register Account
                            </button>
						</div>
						<hr class="mb-6 border-t" />
				
						<div class="text-center">
							<a class="inline-block text-sm text-blue-500 dark:text-blue-500 align-baseline hover:text-blue-800"
								href="login.php">
								Already have an account? Login!
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
  
  
  
  <?php include 'layout/footer.php' ; ?>
</div>

<script src="./auth/create.js"></script>

    


  </body>
</html>
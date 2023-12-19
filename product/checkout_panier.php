<?php 
session_start();
include '../DataBase.php';
$Database = new Database();



if (isset($_SESSION["user"])) {
  $user_id = $_SESSION["user"] ;
}

  
$userData =  $Database->selectData('users','*',"id =  $user_id",'',"1");

  
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>

      <!-- navbar -->
      <nav class="fixed top-0 left-0 right-0 z-[999] flex justify-between bg-gray-900 text-white ">
      <div class="px-5 xl:px-12 py-6 flex w-full items-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
        </svg>
        <span class="ml-2 font-semibold text-white">UltraPC</span>
        <!-- Nav Links -->
        <ul id="links" class="hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12">
          <li><a class="hover:text-gray-200" href="../index.php">Home</a></li>
          
  <!-- Order  -->

          
            
          <?php if (!empty($_SESSION["admin"])) {  ?>
            <!-- setting  -->
            <li> 
<a class="hover:text-gray-200" href="home.php">Admin</a>

   <!-- setting  -->
<?php } ?></li>



    <!-- sing_out  -->
    <?php if ( !empty($_SESSION["user"]) ||  !empty($_SESSION["admin"])) {  ?>
  <form action="../login.php" method="post">
    
          <li class="nav-item me-4">  <button  name="sing_out" class="nav-link ">sing out</button> </li>
             

           </form>
  
<?php } 



else{
  ?>
                 <!-- sign  -->
                 <li><a class="hover:text-gray-200" href="login.php">Login</a></li>

     <!-- sign  -->
     <?php 
}
?>
        </ul>
        <!-- Header Icons -->
    
      <!-- cart  -->
    <?php if (!empty($_SESSION["user"]) ) {  ?>
          <a class="  flex items-center hover:text-gray-200 w-full justify-center md:justify-normal md:w-auto" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>    
            <span class="flex absolute -mt-5 ml-4">
              <span class="animate-ping absolute inline-flex h-3 w-3 rounded-full bg-pink-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-pink-500">
                </span>
              </span>
          </a>
          <?php } 
  ?>
  <!-- cart  -->
 
          
       
      </div>
      <!-- Responsive navbar -->

      <button id="toggle" class="navbar-burger self-center mr-12 md:hidden" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
      </button>
    </nav>

    <script> 
  

const toggleButton = document.getElementById("toggle");
const linksNav = document.getElementById("links");
addEventListener("resize", (event) => {
  
  // console.log(window.screen.width)
  if(window.innerWidth > '768'){
  console.log('yes')

    linksNav.classList = "hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12";
  }
  ;
});
toggleButton.addEventListener("click", function () {
    //if navbar appear hide it if not display it
    if (linksNav.classList.contains("absolute")) {
   
      linksNav.classList = "hidden md:flex px-4 mx-auto font-semibold font-heading space-x-12";
      
    } else {
 
      linksNav.classList = "absolute w-full left-0 right-0 top-16 bg-gray-900  flex-col flex  mx-auto font-semibold font-heading text-center py-4 gap-2";
    }
});
  </script>
    

  <div class=" bg-gray-100 pt-20">
    <h1 class="mb-10 text-center text-2xl font-bold">Cart Items</h1>


    <div class="mx-auto max-w-5xl justify-center px-6 lg:flex md:space-x-6 md:px-0 ">
      <div class="rounded-lg lg:w-2/3 px-4" id="Products" >

     
        <!-- Products -->
     
      
       
                   
         

        <!-- Products -->

      </div>
      <!-- Sub total -->
      <div class="rounded-lg lg:w-2/3 px-4">
    <p class="text-xl font-medium">Payment Details</p>
    <p class="text-gray-400">Complete your order by providing your payment details.</p>
    <div class="">
      <label for="email" class="mt-4 mb-2 block text-sm font-medium">Email</label>
      <div class="relative">
        <input type="text" value="<?= $userData["Email"] ?>" id="email" name="email" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="your.email@gmail.com" />
        <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
          </svg>
        </div>
      </div>
      <label for="card-holder" class="mt-4 mb-2 block text-sm font-medium">Adress</label>
      <div class="relative">
        <input type="text" value="<?= $userData["adresse"] ?>" id="card-holder" name="card-holder" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm uppercase shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Your adresse here" />
        <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
          </svg>
        </div>
      </div>
      <label for="card-no" class="mt-4 mb-2 block text-sm font-medium">Card Details</label>
      <div class="flex">
        <div class="relative w-7/12 flex-shrink-0">
          <input type="text" id="card-no" name="card-no" class="w-full rounded-md border border-gray-200 px-2 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="xxxx-xxxx-xxxx-xxxx" />
          <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
            <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
              <path d="M11 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1z" />
              <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm13 2v5H1V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm-1 9H2a1 1 0 0 1-1-1v-1h14v1a1 1 0 0 1-1 1z" />
            </svg>
          </div>
        </div>
        <input type="text" name="credit-expiry" class="w-full rounded-md border border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="MM/YY" />
        <input type="text" name="credit-cvc" class="w-1/6 flex-shrink-0 rounded-md border border-gray-200 px-2 py-3 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="CVC" />
      </div>
      <label for="billing-address" class="mt-4 mb-2 block text-sm font-medium">Ville</label>
      <div class="flex flex-col sm:flex-row gap-2">
        <div class="relative flex-shrink-0 sm:w-7/12">
          <input type="text" value="Morocco" id="billing-address" name="billing-address" class="w-full rounded-md border border-gray-200 px-4 py-3 pl-11 text-sm shadow-sm outline-none focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="Address" />
          <div class="pointer-events-none absolute inset-y-0 left-0 inline-flex items-center px-3">
            <img class="h-4 w-4 object-contain" src="https://upload.wikimedia.org/wikipedia/commons/2/2c/Flag_of_Morocco.svg" alt="" />
          </div>
        </div>
        <input type="text" name="city" value="<?= $userData["ville"] ?>" class="flex-shrink-0 rounded-md border border-gray-200 px-4 py-3 text-sm shadow-sm outline-none sm:w-1/6 focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="City" />
        <input type="text" name="billing-zip" class="flex-shrink-0 rounded-md border border-gray-200 px-6 py-3 text-sm shadow-sm outline-none sm:w-1/6 focus:z-10 focus:border-blue-500 focus:ring-blue-500" placeholder="ZIP" />
      </div>

      <!-- Total -->
      <div class="mt-6 border-t border-b py-2">
        <div class="flex items-center justify-between">
          <p class="text-sm font-medium text-gray-900">Subtotal</p>
          <p class="font-semibold text-gray-900" id="total"></p>
        </div>
        <div class="flex items-center justify-between">
          <p class="text-sm font-medium text-gray-900">Shipping</p>
          <p class="font-semibold text-gray-900">shipping gratuit</p>
        </div>
      </div>
      <div class="mt-6 flex items-center justify-between">
        <p class="text-sm font-medium text-gray-900">Total</p>
        <p class="text-2xl font-semibold text-gray-900" id="totalFinal" ></p>
      </div>
    </div>
    <button class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white" onclick="location.href = 'biii.php'">Place Order</button>
  </div>
</div>


    </div>
  </div>

  <script>



  function affiche_cart() {
    
var xhttp = new XMLHttpRequest();

xhttp.onreadystatechange = function() {
  if (this.readyState === 4 && this.status === 200) {
    if (xhttp.responseText === 'no') {
      console.log('No user logged in');
    } else {
      var data = JSON.parse(xhttp.responseText);
      var ProductsContainer = document.getElementById("Products");
     

      let total = 0 ;
      // Clear the existing content in ProductsContainer
      ProductsContainer.innerHTML = '';

      data.forEach(function(value) {
        // Create a div element for each product
        var productDiv = document.createElement('div');
        productDiv.classList.add('justify-between', 'mb-6', 'rounded-lg', 'bg-white', 'p-6', 'shadow-md', 'sm:flex', 'sm:justify-start');
        
        // Constructing inner HTML for each product
        productDiv.innerHTML = `
        
          <img src="../${value.img}" alt="product-image" class="w-full rounded-lg sm:w-40" />
          
          <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
        
            <div class="mt-5 sm:mt-0">
              <h2 class="text-lg font-bold text-gray-900">${value.Etiquette}</h2>
              <h4 class="mt-1 text-xs text-blue-600">${value.OffreDePrix} MAD</h4>
            </div>
            <div class="mt-4 flex justify-between im sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">
              <!-- Quantity control buttons -->
              <div class="flex items-center border-gray-100">
              
                <span onclick="rmovemore(0, ${value.panier_id})" class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50"> - </span>
                <span id="resulta" class="rounded-l py-1 px-3.5 duration-100">${value.Stock}</span>
                <span onclick="addmore(1, ${value.panier_id})" class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50"> + </span>
                <svg onclick="delete_prduct(${value.panier_id})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                <path  stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </div>
              <!-- Other details like total price and remove button -->
              <div class="flex items-center space-x-5"><span>Total:</span>
                <h2 class="text-sm">${value.Stock * value.OffreDePrix} MAD</h2>
                
              </div>
            </div>
          </div>
        `;
        
        // Append each productDiv to the ProductsContainer
        ProductsContainer.appendChild(productDiv);
        let productCost = value.Stock * value.OffreDePrix;
          total += productCost;
       
      });
   document.getElementById("total").innerHTML = total + " MAD";
   document.getElementById("totalFinal").innerHTML = total + " MAD";
    }

   
  }
};

xhttp.open("GET", "affiche_panier.php", true);
xhttp.send();
  }


affiche_cart() ;


function change_stock(op , id_product) {
      var xhttp = new XMLHttpRequest();


    xhttp.onreadystatechange = function() {
      if (this.readyState === 4 && this.status === 200) {
        
        console.log(this.responseText); 
        affiche_cart() ;

      }
    };


    xhttp.open("GET", "change_stock.php?op=" + op + "&id_product=" + id_product, true);
    xhttp.send();
    }




function addmore(plus , id_product) {
  
  change_stock(plus , id_product);
}
function rmovemore(moin , id_product) {
  change_stock(moin ,id_product);
}

function delete_prduct(id) {
      var xhttp = new XMLHttpRequest();


    xhttp.onreadystatechange = function() {
      if (this.readyState === 4 && this.status === 200) {
        
        console.log(this.responseText); 
        affiche_cart() ;

      }
    };


    xhttp.open("GET", "delete_prduct.php?id=" + id , true);
    xhttp.send();
    }







  </script>
</body>
</html>



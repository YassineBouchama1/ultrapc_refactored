<?php 
session_start();
include 'backend/DataBase.php';
$Database = new Database();


if (isset($_GET['id'])) {
  $id = $_GET['id'];

$_SESSION['id_pro'] = $id;  

}


$produitData =  $Database->selectData('produit','*',"Reference = $id",'',"1");


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
          <li><a class="hover:text-gray-200" href="index.php">Home</a></li>
          


          
            
          <?php if (!empty($_SESSION["admin"])) {  ?>
            <!-- setting  -->
            <li> 
<a class="hover:text-gray-200" href="home.php">Admin</a>

   <!-- setting  -->
<?php } ?></li>



    <!-- sing_out  -->
    <?php if ( !empty($_SESSION["user"]) ||  !empty($_SESSION["admin"])) {  ?>
      <form action="index.php" method="post">
    
    <li class="nav-item">  <button  name="sing_out" class="hover:text-gray-200">sing out</button> </li>
       

     </form>
   <!-- sing_out  -->
<?php } 



else{
  ?>
                 <!-- sign  -->
                 <li><a class="hover:text-gray-200" href="index.php">Login</a></li>

     <!-- sign  -->
     <?php 
}
?>
        </ul>
        <!-- Header Icons -->
    
      <!-- cart  -->

  <!-- cart  -->
 
          
       
      </div>
      <!-- Responsive navbar -->

      <button id="toggle" class="navbar-burger self-center mr-12 md:hidden" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
      </button>
    </nav>


  <!-- cCart Part -->

  <div id="shopping" class="hidden z-[998]  pointer-events-none fixed inset-y-0 right-0 max-w-full pl-10 my-[60px]">
    <div class="pointer-events-auto w-screen max-w-xs md:max-w-sm h-[600px]">
      <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
        <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
          <div class="flex items-start justify-between">
            <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
              Shopping cart
            </h2>
            <div class="ml-3 flex h-7 items-center">
              <button id="closeShopping" type="button" class="relative -m-2 p-2 text-gray-400 hover:text-gray-500">
                <span class="absolute -inset-0.5"></span>
                <span class="sr-only">Close panel</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                  aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
          </div>
          
          <div class="mt-8" id="shaw_panier">

            <!-- cart  -->


             <!-- endcart  -->
          </div>
          
        </div>
         
     
  
      </div>
    </div>
  </div>

  <!-- Cart Part -->
  
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




  

<section class="py-12 sm:py-16" id="Products"> 
<div class="container mx-auto px-4">


<div class="lg:col-gap-12 xl:col-gap-16 mt-8 grid grid-cols-1 gap-12 lg:mt-12 lg:grid-cols-5 lg:gap-16">
  <div class="lg:col-span-3 row-end-1">
    <div class="flex justify-center">

        <div class="max-w-xl overflow-hidden rounded-lg">
          <img class="h-full w-full max-w-full object-cover" src="<?= $produitData["img"] ?>" alt="" />
        </div>
   

      
    </div>
  </div>

  <div class="lg:col-span-2 lg:row-span-2 lg:row-end-2">
    <h1 class="sm: text-2xl font-bold text-gray-900 sm:text-3xl"><?= $produitData["Etiquette"] ?></h1>
    



    
    <!-- part Banner  -->
    <div class="mt-3 flex select-none flex-wrap items-center gap-1">
    <ul class="mt-8 space-y-2">
      <li class="flex items-center text-left text-sm font-medium text-gray-600">
        <svg class="mr-2 block h-5 w-5 align-middle text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" class=""></path>
        </svg>
        Free shipping worldwide
      </li>

      <li class="flex items-center text-left text-sm font-medium text-gray-600">
        <svg class="mr-2 block h-5 w-5 align-middle text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" class=""></path>
        </svg>
        Cancel Anytime
      </li>
    </ul>
    </div>
<!-- part Banner  -->

<!-- part Price  -->
   

    <div class="mt-10 flex flex-col items-center justify-between space-y-4 border-t border-b py-4 sm:flex-row sm:space-y-0 mb-4">
      <div class="flex items-end">
        <h1 class="text-3xl font-bold"><?= $produitData["OffreDePrix"] ?> MAD</h1>
      </div>
    </div>
        <!-- part Price  -->
    <div class="text-[#559f45] text-md flex justify-center items-center"><span class="text-[#559f45] text-sm px-1 my-2">✓</span>Produit en stock (<?= $produitData["QuantiteStock"] ?>)</div>

        <!-- part btns  -->
    <div class="flex  items-center   justify-center gap-2 mt-2">
      



    <button class="relative group w-3/6 p-2 text-center bg-white text-[#19488f] text-sm border border-[#19488f] hover:bg-[#19488f] hover:text-white hover:border-transparent">
<span class="absolute px-4    top-0 left-0 bottom-0 right-full transition-right duration-300 ease-in bg-[#19488f] text-white text-base flex justify-center items-center group-hover:right-0">+</span>
Ajouter au panier
</button>

 
      </div>
   <!-- part btns  -->
   
  </div>

  <div class="lg:col-span-3">
    <div class="border-b border-gray-300">
      <nav class="flex gap-4">
        <a href="#" title="" class="border-b-2 border-gray-900 py-4 text-sm font-medium text-gray-900 hover:border-gray-400 hover:text-gray-800"> Description </a>

        
      </nav>
    </div>

    <div class="mt-8 flow-root sm:mt-12">
      <h1 class="text-3xl font-bold">Delivered To Your Door</h1>
      <p class="mt-4"><?= $produitData["Description"] ?></p>

    </div>
  </div>
</div>
</div>
</section>

  <script>



  function affiche_cart() {
    
var xhttp = new XMLHttpRequest();

xhttp.onreadystatechange = function() {
  if (this.readyState === 4 && this.status === 200) {
  
    var data = JSON.parse(xhttp.responseText);
      var ProductsContainer = document.getElementById("Products");
      console.log(data);
     
    
     
      // Clear the existing content in ProductsContainer
      ProductsContainer.innerHTML = '';

     
        // Create a div element for each product
        var productDiv = document.createElement('div');
        productDiv.classList.add('container', 'mx-auto', 'px-4');  
        let stock = data.panierData.Stock ;
        
      
        
        // Constructing inner HTML for each product
        productDiv.innerHTML = `
        
      
    <div class="lg:col-gap-12 xl:col-gap-16 mt-8 grid grid-cols-1 gap-12 lg:mt-12 lg:grid-cols-5 lg:gap-16">
      <div class="lg:col-span-3 row-end-1">
        <div class="flex justify-center">
   
            <div class="max-w-xl overflow-hidden rounded-lg">
              <img class="h-full w-full max-w-full object-cover" src="${data.produitData.img}" alt="" />
            </div>
       

          
        </div>
      </div>

      <div class="lg:col-span-2 lg:row-span-2 lg:row-end-2">
        <h1 class="sm: text-2xl font-bold text-gray-900 sm:text-3xl">${data.produitData.Etiquette}</h1>
        

    

        
        <!-- part Banner  -->
        <div class="mt-3 flex select-none flex-wrap items-center gap-1">
        <ul class="mt-8 space-y-2">
          <li class="flex items-center text-left text-sm font-medium text-gray-600">
            <svg class="mr-2 block h-5 w-5 align-middle text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" class=""></path>
            </svg>
            Free shipping worldwide
          </li>

          <li class="flex items-center text-left text-sm font-medium text-gray-600">
            <svg class="mr-2 block h-5 w-5 align-middle text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" class=""></path>
            </svg>
            Cancel Anytime
          </li>
        </ul>
        </div>
  <!-- part Banner  -->

    <!-- part Price  -->
       
    
        <div class="mt-10 flex flex-col items-center justify-between space-y-4 border-t border-b py-4 sm:flex-row sm:space-y-0 mb-4">
          <div class="flex items-end">
            <h1 class="text-3xl font-bold">${data.produitData.OffreDePrix} MAD</h1>
          </div>
        </div>
            <!-- part Price  -->
        <div class="text-[#559f45] text-md flex justify-center items-center"><span class="text-[#559f45] text-sm px-1 my-2">✓</span>Produit en stock (${data.produitData.QuantiteStock})</div>

            <!-- part btns  -->
        <div class="flex  items-center   justify-center gap-2 mt-2">
          
<!-- Input Number -->


  

    ${stock === undefined ? `
   

      ` : ` 
      <div class="bg-white border border-gray-200 rounded-lg dark:bg-slate-900 dark:border-gray-700" >
      <div class="w-full flex justify-between items-center gap-x-1">
      <div class="grow  px-3">
      <span id="valueDisplay" class="w-full p-0 bg-transparent border-0 text-gray-800 focus:ring-0 focus:border-none focus:ourline-none dark:text-white"  >${data.panierData.Stock}</span>
    </div>
    <div class="flex flex-col -gap-y-px divide-y divide-gray-200 border-s border-gray-200 dark:divide-gray-700 dark:border-gray-700">
    
    <button id="increase_btn"  onclick="addmore(1, ${data.panierData.panier_id})"  class="w-7  inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-ee-lg bg-gray-50 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-input-number-increment>
     +  
    </button>
    <button id="decrease_btn"   onclick="rmovemore(0, ${data.panierData.panier_id})"  class="w-7 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-se-lg bg-gray-50 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-800 dark:text-white dark:hover:bg-gray-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-input-number-decrement>
    -
    </button>
  </div>
  </div>
  </div>
    `}

   


 
    
 

<!-- End Input Number -->

${stock === undefined ? `

        <button type="button" onclick="addtocart(${data.produitData.Reference})" class="relative group w-3/6 p-2 text-center bg-white text-[#19488f] text-sm border border-[#19488f] hover:bg-[#19488f] hover:text-white hover:border-transparent">
  <span class="absolute px-4    top-0 left-0 bottom-0 right-full transition-right duration-300 ease-in bg-[#19488f] text-white text-base flex justify-center items-center group-hover:right-0">+</span>
  Ajouter au panier
</button>

` : ''}


          </div>
       <!-- part btns  -->
       
      </div>

      <div class="lg:col-span-3">
        <div class="border-b border-gray-300">
          <nav class="flex gap-4">
            <a href="#" title="" class="border-b-2 border-gray-900 py-4 text-sm font-medium text-gray-900 hover:border-gray-400 hover:text-gray-800"> Description </a>

            
          </nav>
        </div>

        <div class="mt-8 flow-root sm:mt-12">
         
          <h1 class="mt-8 text-3xl font-bold">From the Fine Farms of Brazil</h1>
          <p class="mt-4">${data.produitData.Description}.</p>
        </div>
      </div>
    </div>
        `;
        
        // Append each productDiv to the ProductsContainer
        ProductsContainer.appendChild(productDiv);

  }
};

xhttp.open("GET", "product/affiche_product.php", true);
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


    xhttp.open("GET", "product/change_stock.php?op=" + op + "&id_product=" + id_product, true);
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


    xhttp.open("GET", "product/delete_prduct.php?id=" + id , true);
    xhttp.send();
    }

    function addtocart(id) {
  const xhr = new XMLHttpRequest();
  const url = 'product/checkout.php?id_add=' + id;

  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // When the request is completed and successful (status code 200)
        // Parse the response, assuming it returns JSON data
        const response = xhr.responseText;
        if (response === "no") {
          window.location.href = 'login.php';

        }
        affiche_cart() ;
        console.log('Data:', response);
        // Further actions based on the response can be added here
      } else {
        // If there's an error in the request (status other than 200)
        console.error('Error:', xhr.status);
      }
    }
  };

  // Open a GET request to the specified URL
  xhr.open('GET', url, true);
  // Send the request
  xhr.send();
}






  </script>



</body>
</html>



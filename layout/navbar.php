
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
      <form action="login.php" method="post">
    
    <li class="nav-item">  <button  name="sing_out" class="hover:text-gray-200">sing out</button> </li>
       

     </form>
   <!-- sing_out  -->
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
          <a id="cartIcon_yassine" class="  flex items-center hover:text-gray-200 w-full justify-center md:justify-normal md:w-auto cursor-pointer" >
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>    
            <span class=" p-[12px] -mt-5 ml-4  absolute flex justify-center items-center h-3 w-3 rounded-full bg-blue-500 "><div id="qnt">
             0
            </div></span>
            
              
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
         
     
        <div class="border-t border-gray-200 px-4 py-6 sm:px-6 ">
          <div class="flex justify-between text-base font-medium text-gray-900" id="Subtotal">
            <p>Subtotal</p>
            <p id="totalPrice">$0</p>
          </div>
          <p class="mt-0.5 text-sm text-gray-500">
            Shipping and taxes calculated at checkout.
          </p>
          <div class="mt-6">
            <a id="btn-Checkout" href="product/checkout_panier.php"
            class="cursor-pointer flex items-center justify-center rounded-md border border-transparent bg-red-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-red-700">Checkout</a>
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


  <script>

  let cartIcon = document.getElementById("cartIcon_yassine")
  let openShopping = document.getElementById('shopping');
  let closeShopping = document.getElementById('closeShopping');

  // when clcik close btn on cart 
closeShopping.addEventListener('click', () => {
    // Hide cart
    openShopping.classList.add('hidden');
})

// when clcik on cart icon <remove hide class or add it>
cartIcon.addEventListener('click', () => {

    if (openShopping.classList.contains('hidden')) {
        return openShopping.classList.remove('hidden');
    }
    else {
        return openShopping.classList.add('hidden');
    }
})



  </script>

  
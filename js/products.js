



const limit = 12;
let filteredProducts = []; // Initialize as an empty array to avoid 'undefined' errors
let panierData = []; // Initialize as an empty array to avoid 'undefined' errors

function paginateFun(number_page) {
  const tableElement = document.getElementById("data");

  tableElement.innerHTML = "";

  const start = (number_page - 1) * limit;
  const end = number_page * limit;

 


  const paginate_items = filteredProducts?.slice(start, end).map((elem) => {
 
    let buttonsHTML = `  <button type="button" onclick="addtocart(${elem["Reference"]})" class="group/btn relative w-5/6 p-2 text-end bg-white text-[#19488f] text-sm border border-[#19488f] hover:bg-[#19488f] hover:text-white hover:border-transparent">
    <span class="absolute px-4 top-0 left-0 bottom-0 right-full transition-right duration-300 ease-in bg-[#19488f] text-white text-base flex justify-center items-center group-hover/btn:right-0">+</span>
    Ajouter au panier
  </button>`; // Initialize an empty string to store button HTML


if (panierData.length > 0) {
  panierData.forEach(element => {
    if (element.Etiquette === elem["Etiquette"]) {
      buttonsHTML = `
      <div class="flex items-center border-gray-100">
            
      <span onclick="rmovemore(0, ${element.panier_id})" class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50"> - </span>
      <span id="resulta" class="rounded-l py-1 px-3.5 duration-100">${element.Stock}</span>
      <span onclick="addmore(1, ${element.panier_id})" class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50"> + </span>
    
    </div>
      `;
    }
  });
}
    return `
    <div class="group/item relative m-2 p-2 w-[230px] h-[350px] flex max-w-xs flex-col justify-between overflow-hidden border border-gray-100 bg-white transition duration-300 ease-in-out hover:shadow-md">

    <span class="absolute z-50 top-0 right-0 bg-[#128ece] px-2 text-center text-sm font-medium text-white">-${elem["PrixFinal"] - elem["OffreDePrix"]}.00 MAD</span>

    <div class="relative pt-2 flex h-40 overflow-hidden justify-center">
        <img class="object-cover transition-all duration-300 ease-in-out " src="${elem["img"]}" alt="product image" />
        <div class=" bottom-2 left-2 rounded-md flex justify-center items-center   absolute top-2 right-2 scale-0 transition duration-300 ease-in-out group-hover/item:scale-100  bg-white/30 px-2 text-center ">
        <a href='product_detail.php?id=${elem["Reference"]}' class='px-4 py-2 bg-white/50 rounded-sm shadow-md'>Display</a>
        </div>

    </div>

    <div class="flex justify-between flex-col items-center gap-4">

        <h2 class="text-[#68686c] border-t border-b px-4 text-center">
            ${elem["Etiquette"]}
        </h2>

        <div class="flex flex-col justify-center items-center h-[50px] gap-1">
            <span class="text-[#128ece] font-semibold text-[18px]">${elem["OffreDePrix"]},00 MAD</span>
            <span class="text-[#68686c] text-[12px] line-through leading-[1.2em] block">${elem["PrixFinal"]},00 MAD</span>
            <span class="text-[#559f45] text-md leading-[1.2em] block">
                <span class="text-[#559f45] text-sm px-1">✓</span>Produit en stock (${elem["QuantiteStock"]})
            </span>
        </div>
      
    
        ${buttonsHTML}
    </div>

</div>


`;
  });

  tableElement.innerHTML = paginate_items.join("");

  const buttons = [...Array(Math.ceil(filteredProducts.length / limit)).keys()].map((elem) => {
    return `<li class="page-item">
      <button class="page-link" data-page="${elem + 1}" onclick="paginateFun(${elem + 1})">${elem + 1}</button>
    </li>`;
  });

  document.getElementById("paginate").innerHTML = buttons.join("");

  const buttone = document.querySelectorAll('.page-link');
  buttone.forEach(button => {
    button.classList.remove('active');
  });

  const activeButton = document.querySelector(`.page-link[data-page="${number_page}"]`);
  if (activeButton) {
    activeButton.classList.add('active');
  }
}


//.....................



function affiche_carte() {
    
  var xhttp = new XMLHttpRequest();
  
  xhttp.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      
      if (xhttp.responseText === 'no') {
        console.log('No user logged in');
      } else {
        var data = JSON.parse(xhttp.responseText);
        var ProductsContainer = document.getElementById("shaw_panier");
        var Subtotal = document.getElementById("Subtotal");
       
  
      
        let total = 0 ;
        let total_Stock = 0 ;
        // Clear the existing content in ProductsContainer
        ProductsContainer.innerHTML = '';
  
        data.forEach(function(value) {
          // Create a div element for each product
          var productDiv = document.createElement('div');
          productDiv.classList.add('justify-between', 'mb-6', 'rounded-lg', 'bg-white', 'p-6', 'shadow-md', 'sm:flex', 'sm:justify-start');
          

     

          // Constructing inner HTML for each product
          productDiv.innerHTML = `
   

            <div class="flow-root">
            <ul role="list" id="listCart" class="-my-6 divide-y divide-gray-200">
              <!-- products Added here... -->
          <li class="flex py-6">

            <div
            class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
            <img src="${value.img}"
            alt="name"
            class="h-full w-full object-cover object-center">
          </div>
                      
          <div class="ml-4 flex flex-1 flex-col">
            <div>
              <div class="flex justify-between text-base font-medium text-gray-900">
                <h3>
                  <a>${value.Etiquette}</a>
                      </h3>
                      <p class="ml-4">${value.OffreDePrix} MAD</p>
                      </div>
                    
                    </div>
                    <div class="flex items-center border-gray-100">
              
                    <span onclick="rmovemore(0, ${value.panier_id})" class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50"> - </span>
                    <span id="resulta" class="rounded-l py-1 px-3.5 duration-100">${value.Stock}</span>
                    <span onclick="addmore(1, ${value.panier_id})" class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50"> + </span>
                    <svg onclick="delete_prduct(${value.panier_id})" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 cursor-pointer duration-150 hover:text-red-500">
                    <path  stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </div>
                    </div>
                  </div>
                </li> 
                        </ul>
                      </div>
          `;
          
          // Append each productDiv to the ProductsContainer
          ProductsContainer.appendChild(productDiv);
          let productCost = value.Stock * value.OffreDePrix;
            total += productCost;
          let productStock = value.Stock ;
          total_Stock += productStock;
         
        });
     document.getElementById("Subtotal").innerHTML = `
     <p>Subtotal</p>
     <p id="totalPrice">${total} MAD</p>
     `;
     document.getElementById("qnt").innerHTML = `
  
     ${total_Stock}
     `;
      }
  
     
    }
  };
  
  xhttp.open("GET", "product/affiche_panier.php", true);
  xhttp.send();
    }
  
  
  affiche_carte() ;





function fetchDataAndUpdateTable(selectedValue, searchTerm = '') {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', "products_select.php?selectedValue=" + selectedValue + "&searchTerm=" + searchTerm, true);

  xhr.onload = function () {
    if (xhr.status >= 200 && xhr.status < 300) {
      const data = JSON.parse(xhr.responseText);
      affiche_carte();
      // Update filteredProducts with fetched data
      if(data.produitData){
        filteredProducts = data.produitData;

      }else{
        filteredProducts = data;
      }
      if (data?.panierData?.length > 0) {
        panierData = data.panierData;

      }
      console.log(filteredProducts);

      if (selectedValues.length > 0) {
        const selectedValuesIds = selectedValues.map(id => parseInt(id));
    
if(data.produitData){
  filteredProducts = data.produitData.filter(product => {

    return selectedValuesIds.includes(product.CategorieID);

  });
}else{
  filteredProducts = data.filter(product => {

    return selectedValuesIds.includes(product.CategorieID);

  });
}

      } else {
        console.log(data);
        console.log("category filter faild")
      }

      paginateFun(1); // Call paginateFun after fetching data
    } else {
      console.error('Request failed with status ' + xhr.status);
    }
  };

  xhr.onerror = function () {
    console.error('Request failed');
  };

  xhr.send();
}

fetchDataAndUpdateTable(5);

function handleSelectionChange() {
  var selectElement = document.getElementById('mySelect');
  var selectedValue = selectElement.value;
  fetchDataAndUpdateTable(selectedValue);
}



function filterProducts(searchValue) {

  console.log(searchValue);

  fetchDataAndUpdateTable(10, searchValue);


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

        }else if (response === "0") {
          window.location.href = 'login.php';

        }
        fetchDataAndUpdateTable(5);

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





 





        // Function categories  
        
        let selectedValues = [];

var xhr = new XMLHttpRequest();
xhr.open('GET', "Catégories_select.php", true);

xhr.onload = function() {
  if (xhr.status >= 200 && xhr.status < 300) {
    const data = JSON.parse(xhr.responseText);
 
    const tableElement = document.getElementById("data_Catégories");

// Create an HTML string to store the checkbox list
let htmlString = '';

// Iterate through the data array and build the HTML string
data.forEach(element => {
htmlString += `
<li class="category-container"  >
  <label for="checkbox${element["id"]}">
    <input id="checkbox${element["id"]}" class="form-check-input me-1 min category  big-checkbox" type="checkbox" value="${element["id"]}" >
    <img src="${element["img"]}" alt="..." width="120px" height="130px">
    <span style="width: 192px;" class="form-check-label">${element["Nom"]}</span>
  </label>
</li>

`;


});

tableElement.innerHTML = htmlString;

const checkboxes = document.querySelectorAll('.min');

checkboxes.forEach(checkbox => {
  checkbox.addEventListener('change', function() {
      selectedValues = Array.from(document.querySelectorAll('.min:checked')).map(cb => cb.value);
      // console.log(selectedValues); // Log selectedValues for debugging
      fetchDataAndUpdateTable(selectedValues);
    });
});
// Get all elements with the class 'category'





// Set the inner HTML of the table element with the generated HTML string

  
    

   
  } else {
    console.error('Request failed with status ' + xhr.status);
  }
};

xhr.onerror = function() {
  console.error('Request failed');
};

xhr.send();


// ...........................

function change_stock(op , id_product) {
  var xhttp = new XMLHttpRequest();


xhttp.onreadystatechange = function() {
  if (this.readyState === 4 && this.status === 200) {
    
    console.log(this.responseText); 
    fetchDataAndUpdateTable(5);

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
   
    fetchDataAndUpdateTable(5);
 

  }
};


xhttp.open("GET", "product/delete_prduct.php?id=" + id , true);
xhttp.send();
}


//Get the button:
mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
} 

var ajax = new XMLHttpRequest();
var products_div = document.getElementById('products');


function request(){
    var url = './inventory.php';
    ajax.onreadystatechange = response;
    ajax.open('POST', url, true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send('range=all');
}

function response()
{
    if(ajax.readyState == 4)
    {
        if(ajax.status == 200)
        {
            products_div.innerHTML = "";
            content_mode = "ap";//all products
            var result = JSON.parse(ajax.responseText);
            if( result[0] )
            {
                var row_total = result[1].length;
                for(i = 0; i < row_total; i++)
                {
                    var pr_name = result[1][i].product_name;
                    var pr_description = result[1][i].pr_description;
                    var pr_price = result[1][i].product_price;
                    var pr_image = result[1][i].image;
                    
                    content(pr_name, pr_description, pr_price, pr_image, products_div);
                }
            }else
            {
                alert(result[1]);
            }
        }
    }
}
function content(name, description, price, image_val, div_element)
{ 
   var product_div = document.createElement('div');
   product_div.className = 'product';
   
   
   var image_div = document.createElement('div');
   image_div.className = 'img-hover-zoom';
   var image = document.createElement('img');
   image.src = image_val;
   image_div.appendChild(image);
   
   var pr_sec_div = document.createElement('div');
   pr_sec_div.className = 'pr_mid_sec';
   var p_name = document.createElement('p');
   p_name.append(name);
   var p_descr = document.createElement('p');
   p_descr.append(description);
   var p_price = document.createElement('p');
   p_price.append(price);
   pr_sec_div.appendChild(p_name);
   pr_sec_div.appendChild(p_descr);
   pr_sec_div.appendChild(p_price);
   
   var btn_div = document.createElement('div');
   var viewProduct_btn = document.createElement('button');
   viewProduct_btn.textContent = 'View Product';
   viewProduct_btn.id = 'viewProduct_btn';
   btn_div.appendChild(viewProduct_btn);
   
  product_div.appendChild(image_div); 
  product_div.appendChild(pr_sec_div);  
  product_div.appendChild(btn_div);  
  
  viewProduct_btn.onclick = function()
  {
      go_to_product(name);
      
  };
  div_element.appendChild(product_div);
  
   
}  
request();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var p_d_ajax = new XMLHttpRequest();//ajax object for the product details php file
var p_d_div = document.getElementById('p_d_product');
function request_product(){
    var url = './processShoppingCart.php';
    p_d_ajax.onreadystatechange = response_product;
    p_d_ajax.open('POST', url, true);
    p_d_ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    p_d_ajax.send(null); 
}

function response_product()
{
    if(p_d_ajax.readyState == 4)
    {
        if(p_d_ajax.status == 200)
        {
           p_d_div.innerHTML = "";
            var result = JSON.parse(p_d_ajax.responseText);
            if(result[0])
            {
                var row_total = result[1].length;
                for(i = 0; i < row_total; i++)
                {
                    var pr_name = result[1][i].product_name;
                    var pr_price = result[1][i].product_price;
                    var pr_instock = result[1][i].instock;
                    var pr_description = result[1][i].pr_description;
                    var pr_warranty = result[1][i].warranty;
                    var pr_image = result[1][i].image;
                    
                    moreContent(pr_name,  pr_price,  pr_instock, pr_description, pr_warranty, pr_image, p_d_div);
                    
                }
                
            }else{
                console.log(result[1]);
            }
            
           
        }
    }
}

function moreContent(name,  price,  instock, description, warranty, image_val, div_element)
{ 
   //Content parent div
   var product_div = document.createElement('div');
   product_div.className = 'product_view_div';
   //***************************************************************************
   
   //children divs
   var image_div = document.createElement('div');
   image_div.className = 'product_img';
   
   var right_c_div = document.createElement('div');
   right_c_div.className = 'product_info_div';
   
   var bottom_c_div = document.createElement('div');
   bottom_c_div.className = 'product_mi_div';
   
   var bottom_l_div = document.createElement('div');
   bottom_l_div.className = 'mi_lc_div';
   
   var bottom_r_div = document.createElement('div');
   bottom_r_div.className = 'mi_r_div';
   bottom_r_div.id = "mi_r_div";
   var bottom_b_div = document.createElement('div');
   bottom_b_div.className = 'mi_b_div';
   //***************************************************************************
   
   //image div
   var image_div = document.createElement('div');
   image_div.className = 'img-hover-zoom';
   var image = document.createElement('img');
   image.src = image_val;
   image_div.appendChild(image);
   //***************************************************************************
   
   //right content div
   var p_name = document.createElement('p');
   p_name.append("Product: " + name);
   var p_price = document.createElement('p');
   p_price.append("Price: R" + price);
   var p_stock = document.createElement('p');
   p_stock.append("Available: " + instock);
   var p_warranty = document.createElement('p');
   p_warranty.append(warranty);
   right_c_div.appendChild(p_name);
   right_c_div.appendChild(p_price);
   right_c_div.appendChild(p_stock);
   right_c_div.appendChild(p_warranty);
   //***************************************************************************
   
   //bottom_c_div bottom content div
   var p_description= document.createElement('p');
   p_description.append(description);
   bottom_l_div.appendChild(p_description);
   
   var quantity = document.createElement("INPUT");
   quantity.setAttribute("type", "number");
   quantity.setAttribute("step", "1");
   
   var quantity_lb = document.createElement("LABEL");
   var quantity_txt = document.createTextNode("Quantity: ");
   quantity_lb.setAttribute('for', "quantity");
   quantity_lb.append(quantity_txt);
   
   bottom_r_div.appendChild(quantity);
   //document.getElementById('mi_r_div').insertBefore(quantity_lb, "quantity");
   
   var addToCart_btn = document.createElement('button');
   addToCart_btn.textContent = 'ADD TO CART';
   addToCart_btn.id = 'addCart';
   bottom_b_div.appendChild(addToCart_btn);
   bottom_b_div.id = "bottom_b_div";
   
   bottom_c_div.appendChild(bottom_l_div);
   bottom_c_div.appendChild(bottom_r_div);
   bottom_c_div.appendChild(bottom_b_div);
   
  //**************************************************************************** 
   
  product_div.appendChild(image_div); 
  product_div.appendChild(right_c_div);  
  product_div.appendChild(bottom_c_div);  
 
    
  
  var quantity_val;
  quantity.onchange = function()
  {
      quantity_val = quantity.value;
  };
  
  addToCart_btn.onclick = function()
  {
     
     validateCart(name, quantity_val, price, image_val);
      
  };
  
  div_element.appendChild(product_div);
   document.getElementById('mi_r_div').insertBefore(quantity_lb, quantity);
   
}
request_product();
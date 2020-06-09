/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var ajax_inCart = new XMLHttpRequest(); 
function request_inCart()
{
    
    var url = "viewCart.php";
    ajax_inCart.onreadystatechange = response_inCart;
    ajax_inCart.open('POST', url, true);
    ajax_inCart.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax_inCart.send(null);
}

function response_inCart()
{
    if(ajax_inCart.readyState == 4)
    {
        if(ajax_inCart.status == 200)
        {
            var result = JSON.parse(ajax_inCart.responseText);
            if( result[0])
            {
                //var total = document.getElementById("cart_total");
                //total.textContent = "R"+result[1];
                var quantity = document.getElementById("cart_quantity");
                quantity.textContent = result[2];
                
                
            }else
            {
                var total = document.getElementById("cart_total");
                total.textContent = "R"+result[1];
                var quantity = document.getElementById("cart_quantity");
                quantity.textContent = result[2];
                //alert(result[3]);
            }
        }
    }
}

 setInterval(function(){request_inCart();}, 1000);
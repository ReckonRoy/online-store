/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var xhr = new XMLHttpRequest();


function request_cart(name, quantity, price)
{
   xhr.onreadystatechange = response_cart;
   var url = 'addCart.php';
   xhr.open('POST', url, true);
   xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
   xhr.send('pr_n='+name+'&pr_q='+quantity+'&pr_p='+price);
}

function response_cart()
{
    if(xhr.readyState == 4)
    {
        if(xhr.status == 200)
        {
            var result = JSON.parse(xhr.responseText);
            if(result[0])
            {
                alert(result[1]);
            }else{
                alert(result[1]);
            }
        }
    }
}

function validateCart(n, q, p)
{
    
    if( q <= 0)
    {
        alert("Please enter a value that is > than 0");
    }else{
        request_cart(n, q, p);
        
    }
}

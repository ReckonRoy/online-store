var ajax_basket = new XMLHttpRequest();
var container = document.getElementById('products');
function request()
{
    ajax_basket.onreadystatechange = response;
    var url = 'cartProcess.php';
    ajax_basket.open("POST", url, true);
    ajax_basket.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax_basket.send(null);
}

function response()
{
    if(ajax_basket.readyState == 4)
    {
        if(ajax_basket.status == 200)
        {
            container.innerHTML = "";
            var result = JSON.parse(ajax_basket.responseText);
            
            if(result[0])
            {
                var total = result[1].length;
                for(var i = 0; i < total; i++)
                {
                    var pr_name = result[1][i].product;
                    var pr_quantity = result[1][i].quantity;
                    var pr_price = result[1][i].price;
                    var pr_image = result[1][i].image;
                    
                    content(pr_name,  pr_quantity,  pr_price, pr_image, container);
                }
            }else{
                var msg = result[1];
                error_content(container, msg);
            }
        }
    }
}

function content(name, quantity, price, image, container)
{
    //div elements
    var content = document.createElement('div');
    content.id = "content";
    
    
    
    var r_div = document.createElement('div');
    r_div.id = "r_div"; 
    
    var b_div = document.createElement('div');
    b_div.id = "b_div";
    
    //create element img
    var product_image = document.createElement('img');
    product_image.setAttribute('src', image);
    product_image.id = "pr_image";
    
    //p tags
    var name_p = document.createElement('p');
    name_p.append(name);
    
    var quantity_p = document.createElement('p');
    quantity_p.append(quantity);
    
    var price_p = document.createElement('p');
    price_p.append(price);
    
    //add ptags to r_div
    r_div.appendChild(name_p);
    r_div.appendChild(price_p);
    r_div.appendChild(quantity_p);
    //buttons
    var remove_btn = document.createElement('button');
    remove_btn.id = "remove_btn";
    var remove_txt = document.createTextNode('Romove');
    remove_btn.append(remove_txt);
    b_div.appendChild(remove_btn);
    
    //add children to content div
    
    content.appendChild(product_image);
    content.appendChild(r_div);
    content.appendChild(b_div);
    
    //add content to container
    container.appendChild(content);
    
    remove_btn.onclick = function()
    {
        deleteItem(name);
    };
    
}

function error_content(container, msg)
{
    //div elements
    var content = document.createElement('div');
    
    //p tags
    var msg_p = document.createElement('p');
    msg_p.append(msg);
    
    //add ptag to content
    content.appendChild(msg_p);
    
    //add content to container
    container.appendChild(content);
}

 setInterval(function(){
     request();
 },
 1000);

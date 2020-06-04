var ajax = new XMLHttpRequest();
var container = document.getElementById('products');
function request()
{
    ajax.onreadystatechange = response;
    var url = 'cartProcess.php';
    ajax.open("POST", url, true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send(null);
}

function response()
{
    if(ajax.readyState == 4)
    {
        if(ajax.status == 200)
        {
            container.innerHTML = "";
            var result = JSON.parse(ajax.responseText);
            
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
                console.log(result[1]);
            }
        }
    }
}

function content()
{
    //this div contains all othe elements
    var content = document.createElement('div');
    
    
}
request();
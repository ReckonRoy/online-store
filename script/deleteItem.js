/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var xhr_del = new XMLHttpRequest();

function deleteRequest(n)
{
    var url = "removeCart.php";
    xhr_del.onreadystatechange = deleteResponse;
    xhr_del.open("POST", url, true);
    xhr_del.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr_del.send('product='+n);
}

function deleteResponse()
{
    if(xhr_del.readyState == 4)
    {
        if(xhr_del.status == 200)
        {
            
            var result = JSON.parse(xhr_del.responseText);
            if(result[0])
            {
                alert(result[1]);
            }else{
                alert(result[1]);
            }
        }
    }
}
function deleteItem(n)
{
    deleteRequest(n);
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var ajax = new XMLHttpRequest();
function request()
{
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var url = "accountLogin.php";
    var method = "POST";
    
    ajax.onreadystatechange = response;
    ajax.open(method, url, true);
    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax.send("username="+username+"&password="+password);
}

function response()
{
    if(ajax.readyState == 4)
    {
        if(ajax.status == 200)
        {
            var result = JSON.parse(ajax.responseText);
            if( result[0])
            {
                alert(result[1]);
            }else
            {
                alert(result[1]);
            }
        }
    }
}
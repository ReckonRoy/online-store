/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */ 
var session_ajax = new XMLHttpRequest();//ajax object for the session php file

function request_session(pr_n){
    
    var url = './product_session.php';
    session_ajax.onreadystatechange = response_session;
    session_ajax.open('POST', url, true);
    session_ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    session_ajax.send('product_name='+pr_n); 
}

function response_session()
{
    if(session_ajax.readyState == 4)
    {
        if(session_ajax.status == 200)
        {
            var result = JSON.parse(session_ajax.responseText);
            if(result[0])
            {
                document.location.href = "product_details.php";
            }else{
                console.log(result[1]);
            }
            
           
        }
    }
}
function go_to_product(val)
{
    request_session(val);
    //document.location.href = "product_details.php";
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var acc_log_txt = document.getElementById('acc_log_txt');
var ajax_session = new XMLHttpRequest(); 
const url = "./user_login.php";
let session_bool = false;
let bool_modal = false;
function request_session()
{
    var url = "session.php";
    ajax_session.onreadystatechange = response_session;
    ajax_session.open('POST', url, true);
    ajax_session.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajax_session.send(null);
}

function response_session()
{
    if(ajax_session.readyState == 4)
    {
        if(ajax_session.status == 200)
        {
            var result = JSON.parse(ajax_session.responseText);
            if( result[0])
            {
                //var total = document.getElementById("cart_total");
                //total.textContent = "R"+result[1];
				
                session_content(result[1], acc_log_txt);
				bool = result[0];
                
            }else
            {
				session_content(result[1], acc_log_txt);
				bool = result[0];
            }
        }
    }
}

function login()
{
	if(bool == true){
		
		if(bool_modal == true){
			account_det.style.display = 'block';
			bool_modal = false;
		}else if(bool_modal == false)
		{
			account_det.style.display = 'none';
			bool_modal = true;
		}
		
		
	}else{
		
		document.location.href = url;
	
	}
}

function session_content(text, element)
{
	element.textContent = text;
}



request_session();
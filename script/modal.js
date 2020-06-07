/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var bool = true;
//get profile_img
var modal_pic = document.getElementById('profile_pic');
//get account_det div
var account_det = document.getElementById("account_det");

//**********************************************Register modal*********************************
var closeBtn = document.getElementsByClassName('closeBtn')[0];
var registerForm = document.getElementById('form');

closeBtn.addEventListener('click', closeModal);
function closeModal()
 {
     registerForm.style.display = 'none';
 }

function openRegisterModal()
 {
   
    registerForm.style.display = 'block';
    
 }
 //********************************************************************************************
modal_pic.onclick = function()
{
    
    if(bool == true){
        openModal();
        bool = false;
    }else if(bool == false)
    {
        account_det.style.display = 'none';
        bool = true;
    }
}; 

//function to open our modal
function openModal()
{
    account_det.style.display = 'block';
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var bool = true;
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
 //*****************************************************************************************
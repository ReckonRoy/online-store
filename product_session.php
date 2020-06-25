<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_POST['product_name']))
{
    $_SESSION['s_p'] = $_POST['product_name'];
    echo json_encode([true]);
}else{
    echo json_encode([false, 'something went wrong']);
}
?>
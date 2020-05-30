<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Process shopping cart is invoked when the user has decided to check out the items

require_once 'login.php';
require 'product.php';
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

if(isset($_POST['name'])){
    
    $productObject = new Product();
    $productObject ->setName($_POST['name']);
    $scObject = new ShoppingCart();
    $scObject ->pructuctInfo($connection, $productObject ->getProduct());
}

class ShoppingCart
{
    public function pructuctInfo($conn, $name)
    {
        if($conn -> connect_error )
        {
            die( json_encode([false. 'database connection failed']));
        }
        $query = "SELECT id, product_price, instock, pr_description, warranty, image FROM inventory WHERE product_name = '".$name."'";
        $result = $conn -> query($query);
        if($result)
        {
            echo json_encode([true, 'success']);
        }else{
            echo json_encode([false, 'mysql error']);
        }
    }
}
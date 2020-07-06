<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//Process shopping cart is invoked when the user has decided to check out the items

require_once 'config/login.php';
require 'product.php';
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

   
    $productObject = new Product();
    $productObject ->setName($_SESSION['s_p']);
    $scObject = new ShoppingCart();
    $scObject ->pructuctInfo($connection, $productObject ->getProduct());


class ShoppingCart
{
    public function pructuctInfo($conn, $name)
    {
        if($conn -> connect_error )
        {
            die( json_encode([false. 'database connection failed']));
        }
        $query = "SELECT id, product_name, product_price, instock, pr_description, warranty, image FROM inventory WHERE product_name = '".$name."'";
        $result = $conn -> query($query);
        if($result)
        {
            if($result->num_rows !=0)
            {
                while($each_row = $result->fetch_assoc())
                {
                    $rows[] =  $each_row;
                }
                
                echo json_encode([true, $rows]);
            } else {
                echo json_encode([false, 'product is no longer available']);
            }
        }else{
            echo json_encode([false, 'mysql error']);
        }
    }
}
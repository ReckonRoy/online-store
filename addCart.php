<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'config/login.php';


if(isset($_POST['pr_n']) && isset($_POST['pr_q']) && isset($_POST['pr_p']) && isset($_POST['pr_i']))
{
    $name = $_POST['pr_n'];
    $quantity = $_POST['pr_q'];
    $price = $_POST['pr_p'];
    $image = $_POST['pr_i'];
    
    
    $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if( $connection -> connect_error)
    {
        die( json_encode([false, "database connection error"]));
    }
    if(isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
        $addCartObject = new AddCart();
        $addCartObject -> addToCart($connection, $username, $name, $quantity, $price, $image);
    }else{
    echo json_encode([false, "Please login to continue shopping."]);
}
}

class AddCart
{
    function addToCart($conn, $username, $pr_n, $pr_q, $pr_p, $pr_i)
    {
        $query = "INSERT INTO cart (username, product, quantity, price, image) VALUES('".$username."', '".$pr_n."', '".$pr_q."', '".$pr_p."', '".$pr_i."')";
        $result = $conn -> query($query);
        if($result)
        {            
			echo json_encode([true, "Item added to cart"]);
 
        }else{
            echo json_encode([false, "Technical error please try again later"]);
        }
        $conn -> close();
    }
}

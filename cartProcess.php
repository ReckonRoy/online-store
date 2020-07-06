<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'config/login.php';
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

if($connection -> connect_error)
{
    die(json_encode([false, "Technical error"]));
}

if(isset($_SESSION['username']))
{
    $username = $_SESSION['username'];
    $cartObject = new CartProcess();
    $cartObject->getCartProducts($connection, $username);
}

class CartProcess
{
    function getCartProducts($conn, $username)
    {
        $query = "SELECT product, quantity, price, image FROM cart WHERE username = '".$username."'";
        $result = $conn -> query($query);
        if($result)
        {
            if($result -> num_rows != 0)
            {
                while( $each_row = $result -> fetch_assoc())
                {
                    $rows[] = $each_row;
                }
                echo json_encode([true, $rows]);
                $result->close();
            } else {
                echo json_encode([false, "cart is currently empty"]);
            }
        } else {
            echo json_encode([false, "run query failed"]);
        }
        $conn -> close();
    }
}

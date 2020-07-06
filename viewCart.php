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
    die(json_encode([false, "database connection failed"]));
}
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $viewCartObject = new ViewCart();
    $viewCartObject -> cart($connection, $username);
}
    


class ViewCart
{ 
    private $price = 0;
    private $quantity = 0 ;
    private $total = 0;
    public function cart($conn, $user)
    {
        $query = "SELECT product, quantity, price FROM cart WHERE username = '".$user."'";
        $result = $conn -> query($query);
        if($result)
        {
            if($result -> num_rows != 0)
            {
                while($each = $result -> fetch_assoc())
                {
                    
                    $this -> quantity += $each['quantity'] ;
                    $this -> total += $each['quantity'] * $each['price'];
                    $cart[] = $each; 
                }
                
                echo json_encode([true, $this -> total, $this -> quantity, $cart]);
            } else {
                echo json_encode([false, $this -> total, $this -> quantity,  "cart is empty"]);
            }
        }else{
            echo ([false, "technical error please try again later"]);
        }
    }
}
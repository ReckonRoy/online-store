<?php
session_start();
require_once 'config/login.php';
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

if($connection -> connect_error)
{
    die( json_encode([false, "Technical error! Please try again later"]) );
}

if(isset($_POST['product']))
{
    $pr_name = $_POST['product'];
    //check if username session is set
    if(isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
        $deleteObject =  new DeleteItem();
        $deleteObject -> remove($connection, $pr_name, $username);
    } else {
        json_encode([false, "session is not set"]);
    }
} else {
    json_encode([false, "product is not set"]);
}

class DeleteItem
{
    function remove($conn, $product, $username)
    {
        $query = "DELETE FROM cart WHERE username='".$username."' AND product='".$product."' LIMIT 1";
        $result = $conn -> query($query);
        if($result)
        {
            echo json_encode([true, "Item success fully removed from cart"]);
        }else{
            echo json_encode([false, "Technical error! Query failed"]);
        }
    }
}
?>
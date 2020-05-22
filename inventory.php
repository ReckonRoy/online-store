<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of inventory
 *
 * @author Reckon
 */
require_once 'login.php';
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

if($connection -> connect_error)
{
    die("Could not connect");
}

$inventoryObject = new inventory();
//$inventoryObject -> getAllProducts($connection);

if(isset($_POST['product_search']))
{
    if(!empty($_POST['product_search']))
    {
        $search_arg = $_POST['product_search'];
        $inventoryObject -> searchByCategory($connection, $search_arg);
        
        
    }
}

class inventory 
{
    public function getAllProducts($conn)
    {
        $query = "SELECT * FROM inventory";
        $result = $conn -> query($query);
        if($result)
        {
            if($result -> num_rows != 0)
            {
                while($row = $result -> fetch_assoc())
                {   
                    //echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
                    //echo $row['product_name'];
                    echo json_encode([true, $row]);
                }
            }
        }else{
            echo "query run problem";
        }
        
        $conn -> close();
    }
    
    //method searchByCategory queries the database by passing the string parameter
    public function searchByCategory($conn, $string)
    {
        $query = "SELECT product_name, product_price, pr_description, image FROM inventory WHERE category = '".$string."'";
        $result = $conn -> query($query);
        if($result)
        {
            if($result -> num_rows != 0)
            {
                while( $row_array = $result -> fetch_assoc() )
                {
                    //$image = '<img src="data:image/jpeg;base64,'.base64_encode( $row_array['image'] ).'"/>';
                    echo json_encode([true, $row_array]);
                }
            }else{
                echo "product not found";
            }
        }else{
            echo "error could not run query";
        }
    }
            
}
?>

<html>
    <body>
        <form action="inventory.php" method="post">
            <input type="text" name="product_search">
            <input type="submit" value="search">
        </form>
    </body>
</html>
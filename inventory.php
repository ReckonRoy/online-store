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
require 'login.php';

    $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if($connection -> connect_error)
    {
        die("Could not connect");
    }
    
$inventoryObject = new Inventory();
$inventoryObject -> getAllProducts($connection);

if(isset($_POST['product_search']) && isset($_POST['type_search']))
{
    if(!empty($_POST['product_search']))
    {
        $connection ->connect($db_hostname, $db_username, $db_password, $db_database);
        $type_search = $_POST['type_search'];
        $search_arg = $_POST['product_search'];
        echo $type_search;
        echo $search_arg;
        
        if( $type_search == "category")
        {
            $inventoryObject -> searchByCategory($connection, $search_arg);
        }else if($type_search == "product_name")
        {
            $inventoryObject -> searchByProductName($connection, $search_arg);  
        }
    }
}
//***********************************************************************************************************************
//class Inventory
//***********************************************************************************************************************
class Inventory 
{
    //retrieve all products In inventory database
    public function getAllProducts($conn)
    {
        $query = "SELECT * FROM inventory";
        $result = $conn -> query($query);
        if($result)
        {
            if($result -> num_rows != 0)
            {
                while($each_row = $result -> fetch_assoc())
                {   
                    //echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
                    //echo $row['product_name'];
                    echo json_encode([true, $each_row]);
                }
            } else {
                $info_message = "Stock inventory is currently empty at the moment";
                echo json_encode([false, $info_message]);
            }
            $result -> close();
        }else{
            echo "query run problem";
        }   
        $conn -> close();
    }//end method getAllProducts
    
    //***************************************************************************************************************************
    
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
        $conn -> close();
    }//end method searchByCategory
    
    public function searchByProductName($conn, $string)
    {
        $query = "SELECT product_name, product_price, pr_description, image FROM inventory WHERE product_name = '".$string."'";
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
        $conn -> close();
    }//end method searchByProductName
            
}
?>

<html>
    <body>
        <form action="inventory.php" method="post">
            <select name="type_search">
                <option value="category">Category</option>
                <option value="product_name">Product Name</option>
            </select>
            <input type="text" name="product_search">
            <input type="submit" value="search">
        </form>
    </body>
</html>
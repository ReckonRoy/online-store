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
require 'config/login.php';

    $connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if($connection -> connect_error)
    {
        die( json_encode([false, $connection -> connect_error]));
    }
    
$inventoryObject = new Inventory();



if(!empty($_POST['range']))
{
    $range = 'all';

    if( $_POST['range'] == $range)
    {
        $inventoryObject -> getAllProducts($connection);
    } else {
        echo json_encode([false, 'error']);
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
        $query = "SELECT product_name, product_price, pr_description, image FROM inventory";
        $result = $conn -> query($query);
        if($result)
        {
            if($result -> num_rows != 0)
            {
                while($each_row = $result -> fetch_assoc())
                {   
                    //echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"/>';
                    //echo $row['product_name'];
                    $all_rows[] = $each_row;
                    
                }
                
                echo json_encode([true, $all_rows]);
                
                
            } else {
                $info_message = "Please note we are out of stock! come check on us after a while";
                echo json_encode([false, $info_message]);
            }
        }else{
            $info_message = "SQL query failed";
            echo json_encode([false, $info_message]);
            
        }   
        $result -> close();
        $conn -> close();
    }//end method getAllProducts
          
}
?>

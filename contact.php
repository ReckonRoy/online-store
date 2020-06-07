<?php
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of contact
 *
 * @author le-roy
 */
require 'sanitizeInput.php';
require_once 'login.php';

$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
$sanitizeObject = new SanitizeInput();

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['message']))
{
    if(!empty($_POST['name']) && !empty($_POST['name']) && !empty($_POST['name']) && !empty($_POST['name']))
    {
        $name = $sanitizeObject ->mysqlStringLiteral($connection, $_POST['name']);
        $email = $sanitizeObject ->mysqlStringLiteral($connection, $_POST['email']);
        $address = $sanitizeObject ->mysqlStringLiteral($connection, $_POST['address']);
        $message = $sanitizeObject ->mysqlStringLiteral($connection, $_POST['message']);
        
        $contactObject = new Contact($name, $email, $address, $message);
        $contactObject -> setId($connection);
        
        
    } else {
        echo "empty fields detected";
    }
}

class Contact
{
    private $id; 
    private $name;
    private $email;
    private $address;
    private $message;
    /*
     * class Contact constructor initialises private properties
     */
    function __construct($name, $email, $address, $message)
    {
        $this -> name = $name;
        $this -> email = $email;
        $this -> address = $address;
        $this -> message = $message;   
    }
    
    /*
     * public getter methods to retrieve values from private properties
     */
    public function getId()
    {
        return $this -> id;
    }
    
    public function getName()
    {
        return $this -> name;
    }
    
    public function getEmail()
    {
        return $this -> email;
    }
    
    public function getAddress()
    {
        return $this -> address;
    }
    
    public function getMessage()
    {
        return $this -> message;
    }
    
    /*
     * the following section manages communication with database
     * That is insert and select operations operations
     * once data has been inserted a suucess message is returned otherwise we error message is returned
     */
    
    public function setId($conn)
    {
        $query = "SELECT id FROM client_details WHERE username='".$_SESSION['username']."'";
        $result = $conn -> query($query);
        if($result)
        {
            if($result -> num_rows != 0)
            {
                $row_id = $result -> fetch_assoc(); 
                $this -> id = $row_id['id'];
                
                $query = "INSERT INTO contact (id, name, email, address, message) VALUES('".$this->getId()."', '".$this->getName()."', '".$this->getEmail()."', '".$this->getAddress()."', '".$this->getMessage()."')";
                $result = $conn -> query($query);
                if($result)
                {
                    echo "Thank you for your feedback";
                    echo "<br>";
                    echo "You will be redirected to the home page within 2seconds";
                }else{
                    echo "technical error! please contact web admin@ sourcecodej52@gmail.com";
                    echo "<br>";
                    echo "You will be redirected to the home page within 2 seconds";
                }
                
            } else {
                echo "Please login. ";
                echo "<br>";
                echo "You will be redirected to the home page within 2 seconds";
            }    
        } else {
            echo "Sorry we are experiencing some technical issues";
        }
    }
    
    
}

?>
<script type="text/javascript">
    setInterval(function()
    {
        document.location.href = "index.php";
    }, 2000);
 </script>
<?php

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

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['message']))
{
    if(!empty($_POST['name']) && !empty($_POST['name']) && !empty($_POST['name']) && !empty($_POST['name']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $message = $_POST['message'];
        
        $contactObject = new Contact($name, $email, $address, $message);
        echo $contactObject ->getName();
    }
}

class Contact
{
    private $name;
    private $email;
    private $address;
    private $message;
    
    function __construct($name, $email, $address, $message)
    {
        $this -> name = $name;
        $this -> email = $email;
        $this -> address = $address;
        $this -> message = $message;   
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
}

?>

<html>
<body>
    
    <form action="contact.php" method="post">
        <input type="text" name="name" placeholder="Name...">
        <br>
        <input type="text" name="email" placeholder="Email...">
        <br>
        <input type="text" name="address" placeholder="Address...">
        <br>
        <textarea cols="20" rows="10" name="message" placeholder="Message..."></textarea>
        <br>
        <input type="submit" value="send">
    </form>
    
</body>
</html>

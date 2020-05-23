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
class contact
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
}

?>

<html>
<body>
    
    <form action="contact.php" method="post">
        <input type="text" name="name" placeholder="Name...">
        <input type="text" name="name" placeholder="Email...">
        <input type="text" name="name" placeholder="Address...">
        <textarea cols="20" rows="10" name="message">
    </form>
    
</body>
</html>

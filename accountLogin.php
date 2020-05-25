<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of accountLogin
 *
 * @author le-roy
 */

    if(isset($_POST['username']) && isset($_POST['password']))
    {
        if(!empty($_POST['username']) && !empty($_POST['password']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            
        }
    }
class accountLogin
{
    private $username;
    private $password;
    function __construct($username, $password)
    {
        
        $this -> username = $username;
        $this -> password = $password;
        
    }
    
    public function login($conn)
    {
        if($conn -> connect_error)
        {
            exit("Sorry we could not establish a connection to the database");
        }
    }
    
    public function getUsername()
    {
        return $this -> username;
    }
    public function getPassword()
    {
        return $this -> password;
    }
}

?>
<html>
    <style type="text/css">
        
        .aside{
            border: 1px solid black;
            width: 28%;
            display: inline-block;
            margin-top: 15%;
        }
        
        .loginField
        {
            width: 90%;
            padding: 10px 10px;
            margin: 0px auto;
            margin-bottom: 5px;
            margin-top: 5px;
            
        }
        
        #btn_l_field
        {
            width: 90%;
            padding: 10px 10px;
            margin: 0px auto;
            margin-bottom: 5px;
            margin-top: 5px;
        }
        
        input[type=text]
        {
            padding: 10px;
            width: 330px;
        }
        
        input[type=password]
        {
            padding: 10px;
            width: 330px; 
        }
        
        input[type=submit]
        {
            padding: 5px;
            width: 100px;
        }
    </style>
    <body>
        <div class="aside">
            <form action="accountLogin.php" method="POST">
                <div class="loginField">
                    <input type="text" name="username" placeholder="Username...">
                </div>

                <div class="loginField">
                    <input type="password" name="password" placeholder="Password...">
                </div>

                <div id="btn_l_field">
                    <input type="submit" value="LOGIN">
                </div>
            </form
        </div>
    </body>
</html>

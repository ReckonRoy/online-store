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
require_once 'login.php';
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);

if(isset($_POST['username']) && isset($_POST['password']))
{
    if(!empty($_POST['username']) && !empty($_POST['password']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $loginObject = new accountLogin($username, $password);
        $loginObject -> login($connection);
    }
}
class accountLogin
{
    private $username = "";
    private $password = "";
    function __construct($username, $password)
    {
        
        $this -> username = $username;
        $this -> password = $password;
        
    }
    
    public function getUsername()
    {
        return $this -> username;
    }
    public function getPassword()
    {
        return $this -> password;
    }
    
    public function login($conn)
    {
        if($conn -> connect_error)
        {
            exit("Sorry we could not establish a connection to the database");
        }
        
        $query = "SELECT id FROM client_details WHERE username = '".$this->getUsername()."' AND password = '".$this->getPassword()."'";
        $result = $conn -> query($query);
        if($result)
        {
            if($result -> num_rows != 0)
            {
                $row_id = $result -> fetch_assoc();
                $id = $row_id['id'];
                
                //get name and last name belonging to this id
                $query = "SELECT name, surname FROM client WHERE id = '".$id."'";
                $result = $conn->query($query);
                if($result)
                {
                    if($result -> num_rows != 0)
                    {
                        while($each_row = $result -> fetch_assoc())
                        {
                            $name = $each_row['name'];
                            $surname = $each_row['surname'];
                            
                            session_start();
                            $_SESSION[$name];
                            $_SESSION[$surname];
                        }
                    }else{
                        echo 'technical error';
                    }
                } else {
                    echo "There seem to be an error with the connection";
                }
            }else{
                echo 'invalid username and password combination';
            }
        } else {
            echo 'mysql query error';
        }
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
        
        #misc
        {
            width: 90%;
            margin: 0px auto;
            margin-top: 80px;
            border: 1px solid black;
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
                <div id="misc">
                    <center><p>Don't have an account? <span><a href="register.html">Sign Up</a></span></p></center>
                    <center><p><a href="recovery.php">Forgot your password?</a></p></center>
                </div>
            </form>
        </div>
    </body>
</html>

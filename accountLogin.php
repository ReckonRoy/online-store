<?php
session_start();
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
}else{
    echo json_encode([false, "empty fields detected"]);
    }
} else {
    echo json_encode([false, "empty fields detected"]);
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
            //exit(json_encode([false, "Sorry we could not establish a connection to the database"]));
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
                             
                            
                            $user_n = $each_row['name'];
                            $user_s = $each_row['surname'];
                            
                            
                            $_SESSION['name'] = $user_n;
                            $_SESSION['surname'] = $user_s;
                            $_SESSION['username'] = $this->getUsername();
                            
                            $name_session = $_SESSION['name'];
                            $surname_session = $_SESSION['surname'];
                            
                            $fullName = $name_session. " " .$surname_session;
                            echo json_encode([ true, $fullName ]);
                            
                           
                        }
                        $result -> close();
                    }else{
                        echo json_encode([ false, 'technical error' ]);
                    }
                } else {
                    echo json_encode([false, 'There seem to be an error with the connection']);
                }
            }else{
                echo json_encode([false, 'invalid username and password combination']);
            }
        } else {
            echo json_encode([false, 'mysql query error']);
        }
        $conn -> close();
    }
}
?>

<script type="text/javascript">
    setInterval(function(){
        document.location.href = "index.php";
    }, 2000);
</script>
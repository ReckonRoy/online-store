<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of database_data_processes
 *
 * @author le-roy
 */
require 'client.php';
require 'sanitizeInput.php';
require 'config/login.php';

$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
$sanitizeObject = new SanitizeInput();
if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['gender']))
{
    if( !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['gender']))
    {
        $name = $sanitizeObject ->mysqlStringLiteral($connection, $_POST['name']);
        $surname = $sanitizeObject ->mysqlStringLiteral($connection, $_POST['surname']);
        $username = $sanitizeObject ->mysqlStringLiteral($connection, $_POST['username']);
        $email = $sanitizeObject ->mysqlStringLiteral($connection, $_POST['email']);
        $password = $sanitizeObject ->mysqlStringLiteral($connection, $_POST['password']);
        $gender = $sanitizeObject ->mysqlStringLiteral($connection, $_POST['gender']);
        
        $clientObject = new Client($name, $surname, $gender, $username, $password, $email);
        $dataObject = new database_data_processes();
        $dataObject -> createAccount($connection, $clientObject ->getName(), $clientObject ->getSurname(), $clientObject ->getUsername(), $clientObject ->getEmail(),
                $clientObject ->getGender(), $clientObject ->getPassword());
    } else {
        echo  "Please fill in all fields";
    }
}

class database_data_processes
{
    public function createAccount($conn, $name, $surname, $username, $email, $gender, $password)
    {
        
        if($conn -> connect_error)
        {
            exit("Sorry could not connect.");
        } else {
            echo "connected";
        }

        //$sql = "SELECT username FROM client_details WHERE username='$user_det->name'";
        
        //go ahead and insert user details
        $sql_person = "INSERT INTO client(name, surname, gender) VALUES('$name', '$surname', '$gender')";
        //$sql_user_det = "INSERT INTO client_details(id, username, email, password) VALUES('$person->getId()', '$person->getUsername()', '$person->getPassword()', '$person->getEmail'))";
        //$sql_region = "INSERT INTO user(name, surname, age, gender) VALUES('$region->getCountry()', '$region->getCity()', '$region->getZipCode()', '$region->getAddress'))";

        $result_person = $conn -> query($sql_person);
        if($result_person)
        {
            //get id in order to perform next query
            $sql_getId = "SELECT id FROM client WHERE name='$name' AND surname='$surname'";
            $result_getId = $conn -> query($sql_getId);
            if($result_getId)
            {
                if( $result_getId -> num_rows != 0)
                {
                    //fetch row
                    $row = $result_getId -> fetch_assoc();
                    $id = $row['id'];
                    
                    //insert into 
                    $sql = "INSERT INTO client_details(id, username, password, email) VALUES('$id', '$username', '$password', '$email')";
                    
                    //run query
                    $result_det = $conn -> query($sql);
                    if($result_det)
                    {
                        echo "success";
                    } else {
                        echo 'Registration failed please try again';
                    }

                } else {
                    echo 'Sorry this user already exists';
                }
            }  else {
                //get Id query failed
                 echo die("mysql query failed(2)");
                 
            }
            //proceed to next stage
            
        }else{
            //failed to insert data
            echo "mysql query failed(1)";
        }
    }
    
    public function deleteAccount($conn, $username)
    {
        if($conn->connect_error)
        {
            die("error connecting to database");
        }
        
        $delete_query = "DELETE ";
    }
    
    function sanitize($arg)
    {
        $string_entities = htmlentities($arg);
        $string_slashes = stripslashes($string_entities);
        $string_striptags = strip_tags($string_slashes);
        return $string_striptags;
    }
    
    function mysqlStringLiteral($conn, $arg)
    {
        $string = $conn -> real_escape_string(sanitize($arg));
        return $string;
    }
}

?>
<script type="text/javascript">
    setInterval(function(){
        document.location.href = "index.php";
    }, 2000);
</script>
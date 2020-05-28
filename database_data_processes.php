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
require 'login.php';

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
} else {
    echo "not set";
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
                        echo 'failed';
                    }

                } else {
                    echo 'User does not exist';
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

<html>
    <header>
        <style type="text/css">
            .form
            {
                width: 800px;
            }
            
            .field
            {
                display: inline-block;
                width: 370px;
                margin-bottom: 5px;
                padding: 10px;
            }
            #email_field
            {
                display: inline-block;
                width: 765px;
                margin-bottom: 5px;
                padding: 10px;
            }
            
            #gender_div
            {
                display: inline-block;
                width: 765px;
                margin-bottom: 5px;
                padding: 10px;
            }
            
            #btn_div
            {
                display: inline-block;
                width: 765px;
                margin-bottom: 5px;
                padding: 10px;
            }
            
            input[type=text]
            {
                padding: 5px;
                width: 350px;
            }
            input[type=password]
            {
                padding: 5px;
                width: 350px;
            }
            input[type=email]
            {
                padding: 5px;
                width: 745px;
            }
            
            input[type=submit]
            {
                padding: 5px;
                height: 30px;
            }
            
            input[type=text]:focus {
            color: #495057;
            background-color: #fff;
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 .2rem rgba(0,123,255,.25);
            input[type=password]:focus {
            color: #495057;
            background-color: #fff;
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 .2rem rgba(0,123,255,.25);
            input[type=email]:focus {
            color: #495057;
            background-color: #fff;
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 .2rem rgba(0,123,255,.25);
}
        </style>
    </header>
    <body>
        <form method="POST" action="database_data_processes.php">
            <fieldset class="form">
            <legend>Personalia</legend>
            <div id="form">
                    <div class="field">
                    <label>Name</label>
                        <br>
                        <input type="text" name="name">
                    </div>

                    <div class="field">
                        <label>Surname</label>
                        <br>
                        <input type="text" name="surname">
                    </div>
                </div>
            
                <div>
                    <div class="field">
                        <label>Username</label>
                        <br>
                        <input type="text" name="username">
                    </div>

                    <div class="field">
                        <label>password</label>
                        <br>
                        <input type="password" name="password">
                    </div>
                </div>
            <div id="email_field">
                <label>Email</label>
                <br>
                <input type="email" name="email">
             </div>
            
            <div id="gender_div">
                <label>Gender</label>
                <br>
                <input type="radio" name="gender" value="female">female
                <input type="radio" name="gender" value="male">male
            </div>
            
            <div id="btn_div"><input type="submit" value="REGISTER NOW"></div>
            </fieldset>
        </form>
    </body>
</html>

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
class database_data_processes
{
    public function createAccount($conn, $person, $user_det, $region)
    {
        if($conn -> connect_error)
        {
            exit("Sorry could not connect.");
        }

        $sql = "SELECT username FROM user WHERE username='$user_det->name'";
        $result = $conn -> query($sql);

        if($result)
        {
            if($result->num_rows == 0)
            {
                //go ahead and insert user details
                $sql_person = "INSERT INTO client(name, surname, dob, gender) VALUES('$person->getName()', '$person->getSurname()', '$person->getDob()', '$person->getGender()'))";
                $sql_user_det = "INSERT INTO client_details(id, username, email, password) VALUES('$user_det->getId()', '$user_det->getUsername()', '$user_det->getPassword()', '$user_det->getEmail'))";
                $sql_region = "INSERT INTO user(name, surname, age, gender) VALUES('$region->getCountry()', '$region->getCity()', '$region->getZipCode()', '$region->getAddress'))";

                $result_person = $conn -> query($sql_person);
                if($result_person)
                {
                    //get id in order to perform next query
                    $sql_getId = "SELECT id FROM user WHERE name='$person->getName()' AND surname='$person->getSurname()'";
                    $result_getId = $conn -> query($sql_getId);
                    if($result_getId)
                    {
                        if( $result_getId -> num_rows != 0)
                        {
                            //fetch row
                            //insert into id
                            //insert the last 2 queries into their respective tables

                        }
                    }  else {
                        //get Id query failed
                    }
                    //proceed to next stage
                    $result_person -> free();
                }else{
                    //failed to insert data
                }
                $result->free();
            }else{
                //user already exist
            }
        }
    }
    
    public function deleteAccount($conn, $username)
    {
        if($conn->connect_error)
        {
            die("error connecting to database");
        }
        
        $delete_query = "DELETE "
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

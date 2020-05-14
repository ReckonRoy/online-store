<?php
//This class processes user data such as email, username, and password
class client_aunthenticate_userdata 
{   
    private $username = null;
    private $password = null;
    private $email = null;
    private $id = 0;


    function __construct($id, $username, $password, $email)
    {
        $this -> id = $id;
        $this -> username = $username;
        $this -> password = $password;
        $this -> email = $email;
    }

    //getters to return private properties
    public function getId()
    {
        return $this -> id;
    }
    public function getUsername()
    {
        return $this -> username;
    }

    public function getPassword()
    {
        return $this -> password;
    }

    public function getEmail()
    {
        return $this -> email;
    }
}

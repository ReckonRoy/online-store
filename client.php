<?php
    
//class User holds the functionality of returning and processing basic userdetails such as name, surname, age and gender
class Client
{
    private $name;
    private $surname;
    private $gender;
    private $username;
    private $password;
    private $email;

    function __construct($name, $surname, $gender, $username, $password, $email)
    {
        $this -> name = $name;
        $this -> surname = $surname;
        $this -> gender = $gender;
        $this -> username = $username;
        $this -> password = $password;
        $this -> email = $email;
    }
    
    //getters for private properties
    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this -> surname;
    }

    public function getGender()
    {
        return $this -> gender;
    }
    
    public function getUsername()
    {
        return $this -> username;
    }

    public function getPassword()
    {
        return $this -> password;
    }
    
    public function setUsername($username)
    {
        $this -> username = $username;
    }

    public function setPassword($password)
    {
        $this -> password = $password;
    }

    public function getEmail()
    {
        return $this -> email;
    }
}
?>
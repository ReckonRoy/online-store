<?php
require_once 'login.php';
require_once 'connect.php';
    
//class User holds the functionality of returning and processing basic userdetails such as name, surname, age and gender
class Client
{
    private $name = null;
    private $surname = null;
    private $dob = null;
    private $gender = null;

    function __construct($name, $surname, $dob, $gender)
    {
        $this -> name = $name;
        $this -> surname = $surname;
        $this -> gender = $gender;
        $this -> dob = $dob;
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

    public function getDob()
    {
        return $this -> dob;
    }

    public function getGender()
    {
        return $this -> gender;
    }
}
?>
<?php

class Product
{
    /*
     * private methods
     */
    private $id;
    private $product;
    private $price;
    private $instock;
    private $location;
    private $description;
    private $warranty;
    private $image;
   
    /*  
     * setter methods
     */
    public function setId($id)
    {
        $this -> id = $id;
    }
    public function setName($product)
    {
        $this -> product = $product;
    }
    public function setPrice($price)
    {
        $this -> price = $price;
    }
    public function setInstock($instock)
    {
        $this -> instock = $instock;
    }
    public function setLocation($location)
    {
        $this -> location = $location;
    }
    public function setDescription($descr)
    {
        $this -> description = $descr;
    }
    public function setWarranty($warranty)
    {
        $this -> warranty = $warranty;
    }
    public function setImage($image)
    {
        $this -> image = $image;
    }
    //**********************************************************************
    /*
     * gettrer methods
     */
    public function getId()
    {
        return $this -> id;
    }
    public function getProduct()
    {
        return $this ->product;
    }
    
    public function getPrice()
    {
        return $this -> price;
    }
    public function getInstock()
    {
        return $this -> instock ;
    }
    public function getLocation()
    {
        return $this -> location;
    }
    public function getDescription()
    {
        return $this -> description;
    }
    public function getWarranty()
    {
        return $this -> warranty;
    }
    public function getImage()
    {
        return $this -> image;
    }
}

?>  
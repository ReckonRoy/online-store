<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cart
 *
 * @author le-roy
 */
class Cart {
    private $id;
    private $product_name;
    private $product_quantity;
    private $product_price;
   public function __construct( $id, $pn, $pq, $pp) 
   {
       $this -> id = $id;
       $this -> product_name = $pn;
       $this -> product_quantity = $pq;
       $this -> product_price = $pp;
   } 
   
   public function getProductName()
   {
       return $this -> pruduct_name;
   }
   public function getId()
   {
       return $this -> id;
   }
   public function getProductQuantity()
   {
       return $this -> pruduct_quantity;
   }
   public function getProductPrice()
   {
       return $this -> pruduct_price;
   }
}

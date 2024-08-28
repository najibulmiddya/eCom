<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyLibrary {

    public function __construct() {
        
    }

    public function add_product ($pid,$qty){
        // Session set Product id & Quantity
        $_SESSION['cart'][$pid]['qty']=$qty;
    }

    public function update_product ($pid,$qty){
        if(isset($_SESSION['cart'][$pid])){
            $_SESSION['cart'][$pid]['qty']=$qty;
        }
        
    }

    public function remove_product ($pid,$qty){
        if(isset($_SESSION['cart'][$pid])){
            unset($_SESSION['cart'][$pid]);
        }
        
    }

    public function empty_product ($pid,$qty){
        if(isset($_SESSION['cart'][$pid])){
            unset($_SESSION['cart']);
        }
        
    }
   
    public function total_product (){
        if(isset($_SESSION['cart'])){
          return count($_SESSION['cart']);
        }else{
            return 0;
        }
        
    }
}

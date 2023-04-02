<?php

namespace TechStore\Classes;

class Cart{
    public function add(string $id , array $prodData){
        $_SESSION['cart'][$id] = $prodData;
    }

    public function count(){
        if(isset($_SESSION['cart'])){
            return count($_SESSION['cart']);
        }else{
            return 0;
        }
        
    }

    public function totalPrice(){
        $total = 0;

        if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $id => $prodData){
                $total += $prodData['qty'] * $prodData['price'];
            }
        }
        
        return $total;

    }

    //check if product is on the cart or no
    public function has(string $id):bool
    {
        if(isset($_SESSION['cart'])){
            return array_key_exists($id , $_SESSION['cart']);
        }else{
            return false;
        }
        
        
    }


    public function remove(string $id){
        if(isset($_SESSION['cart'])){
            unset($_SESSION['cart'][$id]);
        }else{
            return false;
        }
         
    }

    public function empty(){
       $_SESSION['cart'] = [];
   }
   public function all(){
    if(isset($_SESSION['cart'])){
        return $_SESSION['cart'];
    }else{
        return [];
    }
    

    
}
}

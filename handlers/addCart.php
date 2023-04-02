<?php require_once("../app.php");
use TechStore\Classes\Cart;

if($request->postHas("submit")){
 $id    = $request->post("id");
 $qty   = $request->post("qty");
 $name  = $request->post("name");
 $price = $request->post("price");
 $img   = $request->post("img");


 $productData =[
    'qty' => $qty,
    'name' => $name,
    'price' => $price,
    'img' => $img
 ];

 $cart = new Cart;
 $cart->add($id , $productData);
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

$request->redirect("products.php");
}
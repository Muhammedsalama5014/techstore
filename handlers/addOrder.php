<?php require_once("../app.php");
use TechStore\Classes\Validation\Validator;
use TechStore\Classes\Models\Order;
use TechStore\Classes\Models\OrderDetails;
use TechStore\Classes\Cart;

if($request->postHas("submit")){

 $name  = $request->post("name");
 $email  = $request->post("email");
 $phone  = $request->post("phone");
 $address  = $request->post("address");

 //validations 
 $validator = new Validator;
 $validator->validate('name' , $name ,['required' , 'str','max']);

 if(! empty($email)){
    $validator->validate('email' , $email ,[ 'email','max']);
    $email = "'$email'";
 }else{
   $email = "NULL";
 }

 $validator->validate('phone' , $phone ,[ 'required','numeric','max']);

 if(! empty($address)){
    $validator->validate('address' , $address ,[ 'str','max']);
    $address = "'$address'";
 }else{
   $address = "NULL";
 }

 if($validator->hasErrors()){
    $session->set('errors' , $validator->getErrors());
    $request->redirect('cart.php');
 }else{
    $order = new Order;
    $orderDetails = new OrderDetails;
    $cart = new Cart;
    $orderId = $order->insertAndGetId("name,email,phone,address","'$name' ,  $email ,'$phone', $address ");

    foreach($cart->all() as $prodId => $prodData){
        $qty = $prodData['qty'];
        $orderDetails->insert("order_id,product_id,qty" , "'$orderId','$prodId','$qty'");

    }
    $cart->empty();
    $request->redirect("products.php");
 }



}
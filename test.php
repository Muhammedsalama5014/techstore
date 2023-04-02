<?php
require_once("app.php"); 


//require_once("classes/Request.php");
//require_once("classes/Session.php");
//require_once("classes/Db.php");
//require_once("classes/Models/Product.php");
//require_once("classes/Models/Order.php");
//require_once("classes/Validation/ValidationRule.php");
//require_once("classes/Validation/Email.php");
//require_once("classes/Validation/Max.php");
//require_once("classes/Validation/Numeric.php");
//require_once("classes/Validation/Required.php");
//require_once("classes/Validation/Str.php");
//require_once("classes/Validation/Validator.php");

//$requset = new Request;
//$secc = new Session;
//echo $requset->get('name');


//$secc->set('name' , 'salama');
//echo $secc->get('name');

/*
$products = new Product;
$res = $products->selectWhere("id > 5 AND price >15100" , "id,name, price");
echo '<pre>';
print_r($res);
echo '</pre>';
*/

/*
$products = new Product;
$res = $products->getCount();
echo '<pre>';
print_r($res);
echo '</pre>';
*/

/*
$orders = new Order;
$res = $orders->selectAll();
echo '<pre>';
print_r($res);
echo '</pre>';
*/
/*
$orders = new Order;
$res = $orders->update("name = 'Muhammed Salama', email ='midosalama5014@hotmail.com' , address = 'Alexandria'" , 1);
echo '<pre>';
var_dump($res);
echo '</pre>';
*/

/*
$products = new Product;
$res = $products->delete(8);
echo '<pre>';
var_dump($res);
echo '</pre>';
*/

/*
$v =new Validator;
$v->validate('age' , 'CSCSDCSDC' , ['required' , 'numeric']);

echo '<pre>';
var_dump($v->getErrors());
echo '</pre>';
*/

//echo $request->get("name");
/*
use TechStore\Classes\Cart;
$cart = new Cart;
echo $cart->totalPrice();*/
/*
use TechStore\Classes\File;
use TechStore\Classes\Request;
use TechStore\Classes\Session;
use TechStore\Classes\Models\Admin;
use TechStore\Classes\Models\Order;
use TechStore\Classes\Models\Product;
use TechStore\Classes\Validation\Validator;
$ad = new Admin;
$res = $ad->login("midosalama5014@hotmail.com" , "123456789" ,$session);

echo "<pre>";
var_dump($res);
echo "</pre>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";


$ad->logout($session);

echo "<pre>";
print_r($_SESSION);
echo "</pre>";*/
/*
use TechStore\Classes\File;
$img = PATH . 'uploads/9.jpg';
    $file = new File($this->img); 
   $imgUploadName =  $file->rename().$file->upload();

   echo $imgUploadName;

 */

 use TechStore\Classes\Models\OrderDetails;
 $det = new OrderDetails;
 $details = $det->selectWithProduct(1);
 echo "<pre>";
print_r($details);
echo "</pre>";


?>
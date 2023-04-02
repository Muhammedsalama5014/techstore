<?php 
require_once("../../app.php");
use TechStore\Classes\Models\Product;

if($request->getHas('id')){
    $id = $request->get('id');

    $pr = new Product;
    $imgName = $pr->selectById($id,'img')['img'];
    unlink(PATH. "uploads/$imgName");
    $pr->delete($id);




    $session->set('success','item deleted succssfuly');
    $request->aredirect('products.php');
}



?>
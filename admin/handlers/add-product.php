<?php 
require_once("../../app.php");
use TechStore\Classes\Models\Product;
use TechStore\Classes\Validation\Validator;
use TechStore\Classes\File;

if($request->postHas('submit')){
$name = $request->post('name');
$cat_id = $request->post('cat_id');
$price = $request->post('price');
$pieces = $request->post('pieces');
$desc = $request->post('desc');
$img = $request->files('img');

//validation

$validator =new Validator;
$validator->validate('name' , $name ,['required' , 'str' , 'max' ]);
$validator->validate('cat_id' , $cat_id ,['required' , 'numeric' ]);
$validator->validate('price' , $price ,['required' , 'numeric' ]);
$validator->validate('pieces number' , $pieces ,['required' , 'numeric' ]);
$validator->validate('description' , $desc ,['required' , 'str' ]);
$validator->validate('image' , $img ,['requiredfile' , 'image' ]);


if($validator->hasErrors()){
    $session->set('errors' , $validator->getErrors());
    $request->aredirect("add-product.php");
}else{
    // upload img
    $file = new File($img); 
   $imgUploadName =  $file->rename()->upload();
    
    //db query

$pr =new Product;
$pr->insert("name , `desc` , price ,pieces_no, img ,cat_id","'$name','$desc','$price','$pieces', '$imgUploadName', '$cat_id'");

    $session->set('success' , 'product added successfully');
    $request->aredirect("products.php");

}
}else{
    $request->aredirect("add-products.php");
}
<?php 
require_once("../../app.php");
use TechStore\Classes\Models\Product;
use TechStore\Classes\Validation\Validator;
use TechStore\Classes\File;
if($request->postHas('submit')){
$id = $request->post('id');
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
if($img['error'] == 0){
    $validator->validate('image' , $img ,[ 'image' ]);
}

if($validator->hasErrors()){
    $session->set('errors' , $validator->getErrors());
    $request->aredirect("edit-product.php");
}else{

        //لازم الاول نجييب اسم الصورة القديمة علشان او هنغيرها او نسيبها
    $pr =new Product;
    $imgName = $pr->selectById($id,'img')['img'];
    
    if ($img['error'] ==0){
     unlink(PATH . "uploads/$imgName");
     $file = new File($img);
     $imgName = $file->rename()->upload();
            
    }


    $pr->update("name = '$name', `desc` ='$desc', price = '$price',
     pieces_no = '$pieces', cat_id = '$cat_id', img = '$imgName'",$id);
    
    $session->set('success' , 'product updated successfully');
    $request->aredirect("products.php");

}
}else{
    $request->aredirect("edit-products.php");
}

?>
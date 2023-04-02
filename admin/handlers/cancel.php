<?php 
require_once("../../app.php");
use TechStore\Classes\Models\Order;

if($request->getHas('id')){
    $id = $request->get('id');
    $ord = new Order;
    $ord->update("status = 'canceled'",$id);

    $session->set('errors', 'orderd approved');
    $request->aredirect("order.php?id=".$id);

}

?>
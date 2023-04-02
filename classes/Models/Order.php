<?php 
namespace TechStore\Classes\Models;
use TechStore\Classes\Db;


class Order extends Db{
    public function __construct(){
        $this->table = "orders";
        $this->connect();
    }

    public function selectAll($fileds = "*"){
        $sql = "SELECT $fileds FROM $this->table JOIN order_details join products 
        ON orders.id * order_details.order_id
        AND order_details.product_id = products.id
        GROUP BY orders.id";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

    public function selectById($id,string $fileds = "*")
    {
        $sql = "SELECT $fileds FROM $this->table JOIN order_details join products 
                ON orders.id = order_details.order_id
                AND order_details.product_id = products.id
                WHERE $this->table.id = $id";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }


    //orders.id, orders.name, orders.phone,orders.status, orders.created_at, SUM(qty * price) AS total 
   /*SELECT orders.*, order_details.qty, products.name AS productName, products.price FROM orders JOIN order_details join products 
ON orders.id = order_details.order_id
AND order_details.product_id = products.id
WHERE orders.id = 2*/
}

?>
<?php
namespace TechStore\Classes;

abstract class Db{
    protected $conn;
    protected $table;

    public function connect()
    {
        $this->conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);
    }
    public function selectAll($fileds = "*"){
        $sql = "SELECT $fileds FROM $this->table";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

    public function selectById($id,string $fileds = "*")
    {
        $sql = "SELECT $fileds FROM $this->table WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function selectWhere($cond,string $fileds = "*"):array
    {
        $sql = "SELECT $fileds FROM $this->table WHERE $cond";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

    public function getCount():int
    {
        $sql =  "SELECT COUNT(*) AS cnt FROM $this->table";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result)['cnt'];

    }

    public function insert(string $fields , string $value):bool
    {
        $sql = "INSERT INTO $this->table ($fields) VALUE ($value) ";
        return mysqli_query($this->conn, $sql);
    }

    public function insertAndGetId(string $fields , string $value)
    {
        $sql = "INSERT INTO $this->table ($fields) VALUE ($value) ";
        mysqli_query($this->conn, $sql);
        return $this->conn->insert_id;
    }

    public function update(string $set , $id)
    {
        $sql = "UPDATE $this->table SET $set WHERE id = $id";
        mysqli_query($this->conn, $sql);
        return mysqli_insert_id($this->conn);
    }
    public function delete($id):bool
    {
        $sql = "DELETE FROM $this->table  WHERE id = $id";
        return mysqli_query($this->conn, $sql);
    }
}


?>
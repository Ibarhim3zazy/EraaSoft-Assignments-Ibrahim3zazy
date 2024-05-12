<?php

class Product extends DB
{
    private $table = 'products';
    private $conn;

    public function __construct()
    {
        $this->conn = $this->connect();
    }

    public function getAllProducts()
    {
        return $this->conn->get($this->table);
    }

    public function insertProduct($data) {
        return $this->conn->insert($this->table, $data);
    }

    public function getRow($productId) {
        $db = $this->conn->where('id', $productId);
        return $db->getOne($this->table);
    }

    public function updateProduct($productId, $data) {
        $db = $this->conn->where('id', $productId);
        return $db->update($this->table, $data);
    }

    public function deleteProduct($productId) {
        $db = $this->conn->where('id', $productId);
        return $db->delete($this->table);
    }

    
}
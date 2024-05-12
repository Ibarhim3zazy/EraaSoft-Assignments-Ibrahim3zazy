<?php

class ProductController
{
    public function index()
    {
        $db = new product();
        $data['products'] = $db->getAllProducts();
        view::load('product/index', $data);
    }

    public function add()
    {
        view::load('product/add');
    }

    public function store()
    {
        if (isset($_POST['name'])) {
            foreach ($_POST as $key => $value) $$key = $value;
            $data = [
                'name' => $name, 
                'price' => $price, 
                'description' => $description, 
                'qty' => $qty
            ];
            $db = new product();
            if ($db->insertProduct($data)) {
                view::load('product/add', ['success' => 'Data Created Successfuly']);
            }else {
                view::load('product/add');
            }
            // echo "$name ___ $price ___ $description ___ $qty";
        }
    }
    // delete product
    public function delete($productId)
    {
        if (isset($productId)) {
            $db = new product();
            if ($db->deleteProduct($productId)) {
                view::load('product/delete', ['success' => 'Data Has Been Successfuly Deleted']);
            }else {
                view::load('product/delete', ['success' => 'Faild to delete data']);
            }
            // echo "$name ___ $price ___ $description ___ $qty";
        }
    }
}
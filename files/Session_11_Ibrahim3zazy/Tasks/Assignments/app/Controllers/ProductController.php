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
    public function delete()
    {
        if (isset($_POST['productId'])) {
            foreach ($_POST as $key => $value) $$key = $value;
            $data = [
                'name' => $name, 
                'price' => $price, 
                'description' => $description, 
                'qty' => $qty
            ];
            $db = new product();
            if ($db->deletetProduct($data)) {
                view::load('product/delete', ['success' => 'Data Has Been Successfuly']);
            }else {
                view::load('product/delete');
            }
            // echo "$name ___ $price ___ $description ___ $qty";
        }
    }
}
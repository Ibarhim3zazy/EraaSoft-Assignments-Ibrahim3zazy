<?php

class ProductController
{
    public function index()
    {
        $db = new product();
        $data['products'] = $db->getAllProducts();
        view::load('product/index', $data);
    }
}
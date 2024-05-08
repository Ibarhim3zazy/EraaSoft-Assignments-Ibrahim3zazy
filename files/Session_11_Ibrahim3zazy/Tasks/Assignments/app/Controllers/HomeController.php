<?php

class HomeController
{
    public function index2($id)
    {
        // echo $id;
        $data['title'] = "Home Page"; 
        $data['content'] = "Content of home page"; 
        View::load('home', $data);
        // echo 'this class is: '. __CLASS__ . ' and method is: ' . __METHOD__;
    }
}
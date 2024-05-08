<?php

class View
{
    public static function load($viewname, $viewdata=[])
    {
        $file = VIEWS.$viewname.'.php';
        if (file_exists($file)) {
            extract($viewdata);
            ob_start();
                require($file);
            ob_end_flush();
        }else {
            echo 'The view: ' . $viewname . ' is not exist';
        }
        
    }
}
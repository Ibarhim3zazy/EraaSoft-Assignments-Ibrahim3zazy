<?php 

    function sanitizeInput($input)
    {
        return htmlspecialchars(htmlentities(stripslashes(trim($input))));
    }
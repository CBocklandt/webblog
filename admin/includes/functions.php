<?php
    function classAutoloader($class){
        $class = strtolower($class);
        $the_path = "includes/{$class}.php";
        if (is_file($the_path)){
            if (file_exists($the_path) && !class_exists($class)){
                include ($the_path);
            }else{
                die("This filename  {$class}.php was not found");
            }
        }
    }
    spl_autoload_register("classAutoloader");

    function redirect($location)
    {
        header("Location: {$location}");
    }
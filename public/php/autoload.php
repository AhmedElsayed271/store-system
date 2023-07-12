<?php
namespace c\t\a;

class autoloader {

    public static function   class_load($class) {

        echo $class;
    
        include __DIR__ . '/' . $class . '.php';
    }
}

$autoloader = new autoloader;

echo  autoloader::class;

spl_autoload_register([autoloader::class, 'class_load']);
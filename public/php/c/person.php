<?php

namespace c;

// use a\person as persona;

const HELLO = "Hello const from b";

function hello() {
    echo "hello from b";
}

trait info {
    public $prop = "testing";
}

class person 
{
    use info;


    const age = "125";
    public static $age = "test";
    public  $name = "test";

    public function __construct()
    {
        echo "Hello From c";
        $this->name = __CLASS__;
    }

}

$ojbec = new person();

var_dump($ojbec);

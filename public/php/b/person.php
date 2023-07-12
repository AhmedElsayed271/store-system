<?php

namespace a;

// use a\person as persona;

const HELLO = "Hello const from b";

function hello() {
    echo "hello from b";
}

class person
{



    const age = "125";
    public static $age = "test";
    public  $name = "test";

    public function __construct()
    {
        echo "Hello From b";
        $this->name = __CLASS__;
    }

}

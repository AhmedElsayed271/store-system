<?php

namespace a;

const HELLO = "Hello const from a";

function hello() {
    echo "hello from a";
}

class person
{

    const age = "125";
    public static $age = "test";
    public  $name = "test";

    public function __construct()
    {
        echo "Hello From a";
    }

}

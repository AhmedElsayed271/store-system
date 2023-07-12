<?php

namespace test;

// include __DIR__ .  "/a/person.php";
// include __DIR__ .  "/b/person.php";
include __DIR__ .  "/autoload.php";




// use b\person as test;
// use function b\hello as test; 
// use const b\HELLO AS TEST; 

// use person as test;

// hello();
// \echo TEST;

// echo b\HELLO;

// $person = new test();
echo "<br>";
$person = new \c\person();


// var_dump($person );
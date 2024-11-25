<?php

$test1 = "Hello world!";
$test2 = 10;
$test3 = TRUE;

var_dump($test1);
var_dump($test2);
var_dump($test3);

for ($i = 0; $i <= 20; $i++) {
    if ($i % 2 === 0) {
        echo $i;
    }
}
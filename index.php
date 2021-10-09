<?php

// var_dump($_SERVER);

$path = ltrim($_SERVER['REQUEST_URI'], '/');
$elements = explode('/', $path);

include 'templates\index.html';

var_dump($elements[1]);

// var_dump($_POST);


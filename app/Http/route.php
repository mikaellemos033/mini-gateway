<?php 

$route = new Sect\Http\Routing\Route();

$route->get('/', 'App\Http\Controllers\Home@index');
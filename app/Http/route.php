<?php 

$route = new Sect\Http\Routing\Route();

$route->get('shipping/:id', 'App\Http\Controllers\Payments@index');
$route->get('/', 'App\Http\Controllers\Pages@index');

$route->get('corporations', 'App\Http\Controllers\Corporations@index');
$route->post('corporations', 'App\Http\Controllers\Corporations@create');

$route->post('payment/credit-card', 'App\Http\Controllers\Payments@credit');
$route->post('payment/ticket', 'App\Http\Controllers\Payments@ticket');
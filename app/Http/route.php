<?php 

$route = new Sect\Http\Routing\Route();

$route->get('/', 'App\Http\Controllers\Pages@index');
$route->get('payment-types', 'App\Http\Controllers\Pages@paymentTypes');
$route->get('corporations', 'App\Http\Controllers\Pages@corporations');
<?php

require ('../vendor/autoload.php');

define('BASE', __DIR__ . '/../');
define('SECT_BASE', sprintf('%s/../vendor/mikaellemos033/santo/src/Santo', __DIR__));

$config   = new Sect\Config\Raw(SECT_BASE . '/Fire');
$provider = new Sect\Providers\KickProvider();

$provider->handle(array_merge($config->fire('Providers'), $config->config(BASE . '/config/Providers')));

require (BASE . '/app/Http/route.php');
return print($route->run());
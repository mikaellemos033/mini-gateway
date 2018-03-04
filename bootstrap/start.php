<?php

define('BASE', __DIR__ . '/../');
define('SECT_BASE', sprintf('%s/../vendor/mikaellemos033/santo/src/Santo', __DIR__));

require BASE . '/vendor/autoload.php';

$config   = new Sect\Config\Raw(SECT_BASE . '/Fire');
$provider = new Sect\Providers\KickProvider();

$provider->handle(array_merge(
	$config->fire('Providers'), 
	$config->config(BASE . '/config/Providers')
));

<?php 

require '../bootstrap/start.php';
require BASE . '/app/Http/route.php';

return print($route->run());
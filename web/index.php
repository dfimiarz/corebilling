<?php

use Symfony\Component\HttpFoundation\Request;

require_once __DIR__ . '/../vendor/autoload.php';


$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

$app = new Silex\Application();

$app->get('/', function(){
    return 'API test';
});

$app->post('/api/statments', function(Request $req){
    
    $data = $req->getContent();
    return $data;
});

$app['debug'] = true;

$app->run();
<?php

use App\Kernel;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

require __DIR__ . '/../vendor/autoload.php';

if (!isset($_SERVER['APP_ENV'])) {
    (new Dotenv())->load(__DIR__ . '/../.env');
}

$debug = (bool) $_SERVER['APP_DEBUG'];

if ($debug) {
    Debug::enable();
}

$env = $_SERVER['APP_ENV'];
$kernel = new Kernel(
    $env,
    $debug
);

$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
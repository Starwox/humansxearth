<?php

use App\Kernel;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\HttpFoundation\Request;

require dirname(__DIR__).'/vendor/autoload.php';

(new Dotenv())->bootEnv(dirname(__DIR__).'/.env');

if ($_SERVER['APP_DEBUG']) {
    umask(0000);

    Debug::enable();
}

if ($trustedProxies = $_SERVER['TRUSTED_PROXIES'] ?? false) {
    Request::setTrustedProxies(explode(',', $trustedProxies), Request::HEADER_X_FORWARDED_ALL ^ Request::HEADER_X_FORWARDED_HOST);
}

if ($trustedHosts = $_SERVER['TRUSTED_HOSTS'] ?? false) {
    Request::setTrustedHosts([$trustedHosts]);
}
/*
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
*/

$kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
$request = Request::createFromGlobals();

$request->headers->set('Content-Type', 'application/json');
$request->headers->set('Access-Control-Allow-Origin', '*');
$request->headers->set('Access-Control-Allow-Credentials', 'true');
$request->headers->set('Access-Control-Max-Age', '60');
$request->headers->set('Access-Control-Allow-Headers', 'AccountKey,x-requested-with, Content-Type, origin, authorization, accept, client-security-token, host, date, cookie, cookie2');
$request->headers->set('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');


$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);


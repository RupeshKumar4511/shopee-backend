<?php
header("Access-Control-Allow-Origin: https://shopee-one.netlify.app",true);
header("Access-Control-Allow-Credentials: true",true);
header("Access-Control-Allow-Headers: Content-Type, Authorization",true);
header("Access-Control-Allow-Methods: POST, OPTIONS",true);
header("Content-Type: application/json");                   

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

function env($key) {
    return $_ENV[$key] ?? $_SERVER[$key] ?? getenv($key) ?: null;
}

$server   = env('DB_HOST');
$user     = env('DB_USERNAME');
$password = env('DB_PASSWORD');
$database = env('DB_NAME');
$portno   = (int) env('DB_PORT');

$connection = mysqli_connect($server,$user,$password,$database,$portno);

if(!$connection){
    echo "Something went wrong";
}else{
    // echo "Successfully connected";
}
?>
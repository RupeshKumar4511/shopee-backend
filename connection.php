<?php
header("Access-Control-Allow-Origin: http://localhost:5173",true);
header("Access-Control-Allow-Credentials: true",true);
header("Access-Control-Allow-Headers: Content-Type, Authorization",true);
header("Access-Control-Allow-Methods: POST, OPTIONS",true);
header("Content-Type: application/json");                   


require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$server = $_ENV['DB_HOST'];
$user = $_ENV['DB_USERNAME'];;
$password =$_ENV['DB_PASSWORD'];
$database = $_ENV['DB_NAME'];
$portno = $_ENV['DB_PORT'];

$connection = mysqli_connect($server,$user,$password,$database,$portno);

if(!$connection){
    echo "Something went wrong";
}else{
    // echo "Successfully connected";
}
?>
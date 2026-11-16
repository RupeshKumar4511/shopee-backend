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

$connection = mysqli_init();

mysqli_ssl_set($connection, NULL, NULL, NULL, NULL, NULL);


mysqli_options($connection, MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, false);

$connected = mysqli_real_connect(
    $connection,
    $server,
    $user,
    $password,
    $database,
    $portno,
    NULL,
    MYSQLI_CLIENT_SSL
);

if (!$connected) {
    echo "Something went wrong";
    
} else {
    echo "Successfully connected";
}
?>
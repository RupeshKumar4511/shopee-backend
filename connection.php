<?php
header("Access-Control-Allow-Origin: http://localhost:5173",true);
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
    error_log("DB connection error: " . mysqli_connect_error());
} else {
    // echo "Successfully connected";
}
?>
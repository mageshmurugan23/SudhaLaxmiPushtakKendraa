<?php
// Securely load environment variables
$env = require __DIR__ . '/../env.php';

$conn = new mysqli(
    $env['DB_HOST'],
    $env['DB_USER'],
    $env['DB_PASS'],
    $env['DB_NAME'],
    $env['DB_PORT']
);

if($conn->connect_error){
    die("Connection Failed");
}
?>
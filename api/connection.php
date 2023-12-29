<?php
$db_ca      = $_ENV["PLANETSCALE_SSL_CERT_PATH"];
$server     = $_ENV["PLANETSCALE_DB_HOST"];
$userName   = $_ENV["PLANETSCALE_DB_USERNAME"];
$password   = $_ENV["PLANETSCALE_DB_PASSWORD"];
$db         = $_ENV["PLANETSCALE_DB"];

function connect(){
global $db_ca, $server, $userName, $password, $db;
$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, $db_ca, NULL, NULL);
mysqli_real_connect($conn, $server, $userName, $password, $db, NULL, NULL, MYSQLI_CLIENT_SSL);

if(!$conn){
die("Database connection error: " . mysqli_connect_error());
}

return $conn;
}

function disconnect($conn){
mysqli_close($conn);
}
?>
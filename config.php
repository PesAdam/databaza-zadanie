<?php

include('functions.php');

define('BASE_URL', 'http://localhost:8008');
define('APP_PATH', realpath(__DIR__ . '/../'));
// $servername = "46.229.230.163";
// $dbname = "hz024701db";
// $username = "hz024700";
// $password = "dhynydor";

$servername = 'localhost';
$dbname = 'knihy';
$username = 'root';
$password = '';


try {
    $DB = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; 
    
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

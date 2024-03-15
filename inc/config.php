<?php
$servername = "46.229.230.163";
$dbname = "hz024701db";
$username = "hz024700";
$password = "dhynydor";

try {
    $DB = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; 
    
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

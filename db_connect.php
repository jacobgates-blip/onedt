<?php
// Database connection settings
$host 	= "db";          	
$database = "gate_db";   
$username = "root";       
$password = "0wlBear";   
 
try {
	$pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Connected successfully!";
} catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
?>

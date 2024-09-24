<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
 
try { 
  $conn = new PDO("mysql:host=$servername;dbname=news", $username, $password); 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  // echo "Connected successfully"; 
} catch(PDOException $e) { 
  echo "Connection failed: " . $e->getMessage(); 
}


$site_url = 'http://localhost/news';
?>
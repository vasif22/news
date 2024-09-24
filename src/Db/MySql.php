<?php
namespace App\Db;
use PDO;



class MySql implements Connection{
   private string $servername = "localhost"; 
  private string $username = "root"; 
private string $password = ""; 

    public function connection(){
      try { 
        $conn = new PDO("mysql:host=$this->servername;dbname=news", $this->username, $this->password); 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        return $conn;
      } catch(PDOException $e) { 
        echo "Connection failed: " . $e->getMessage(); 
      }
    }
}
?>
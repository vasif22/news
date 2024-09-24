<?php
namespace App\Models;
use App\Db\MySQL;
use PDO;

class Model extends MySQL {

    public function getData(string $sql, array $binding = []){
        $stmt = $this->Connection()->prepare($sql);
        $stmt->execute($binding);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
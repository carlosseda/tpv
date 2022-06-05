<?php

namespace app\Models;

require_once 'core/Connection.php';

use PDO;
use core\Connection;

class Product extends Connection {

    public function index() {

        $query =  "SELECT * FROM productos 
                INNER JOIN precios ON productos.id = precios.producto_id 
                WHERE precios.vigente = 1";
                
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        if ($result) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
}

?>

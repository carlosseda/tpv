<?php

namespace app\Models;

require_once 'core/Connection.php';

use PDO;
use core\Connection;

class Product extends Connection {

    public function filterCategory($category_id) {

        $query =  "SELECT * FROM productos WHERE activo = 1 AND visible = 1 AND categoria_id = %s";
                
        $stmt = $this->pdo->prepare($query, $category_id);
        $result = $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>

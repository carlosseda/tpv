<?php

namespace app\Models;

require_once 'core/Connection.php';

use PDO;
use core\Connection;

class Product extends Connection {

    public function filterCategory($category_id) {

        $query =  "SELECT nombre, productos.imagen_url, produtos_categorias.nombre AS categoria 
        FROM productos INNER JOIN productos_categorias ON productos.categoria_id = productos_categorias.id  
        WHERE activo = 1 AND visible = 1 AND categoria_id = '".$category_id."'";
                
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>

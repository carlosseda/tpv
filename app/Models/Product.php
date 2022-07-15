<?php

namespace app\Models;

require_once 'core/Connection.php';

use PDO;
use core\Connection;

class Product extends Connection {

    public function index($category_id) {

        $query =  "SELECT productos.imagen_url, productos.nombre, precios.id AS precio_id FROM productos 
        INNER JOIN precios ON productos.id = precios.producto_id 
        WHERE productos.activo = 1 AND precios.vigente = 1 AND productos.visible = 1 AND productos.categoria_id = '".$category_id."'";
                
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategory($category_id) {

        $query =  "SELECT productos_categorias.nombre AS nombre FROM productos 
        INNER JOIN productos_categorias ON productos.categoria_id = productos_categorias.id 
        WHERE productos.categoria_id = '".$category_id."'";
                
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>

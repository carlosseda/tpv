<?php

namespace app\Models;

require_once 'core/Connection.php';

use PDO;
use core\Connection;

class Ticket extends Connection {

    public function show($table_id) {

        $query =  "SELECT productos.nombre AS nombre, precios.precio_base AS precio_base, productos.imagen_url AS imagen_url, categorias.nombre AS categoria FROM tickets 
        INNER JOIN precios ON tickets.precio_id = precios.id 
        INNER JOIN productos ON precios.producto_id = productos.id 
        INNER JOIN categorias ON productos.categoria_id = categorias.id
        WHERE tickets.activo = 1 AND tickets.venta_id = null AND tickets.mesa_id = '".$mesa_id."'";
                
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>

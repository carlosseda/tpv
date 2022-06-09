<?php

namespace app\Models;

require_once 'core/Connection.php';

use PDO;
use core\Connection;

class Ticket extends Connection {

    public function show($table_id) {

        $query =  "SELECT productos.id AS id, productos.nombre AS nombre, precios.precio_base AS precio_base, productos.imagen_url 
        AS imagen_url, productos_categorias.nombre AS categoria
        FROM tickets 
        INNER JOIN precios ON tickets.precio_id = precios.id 
        INNER JOIN productos ON precios.producto_id = productos.id 
        INNER JOIN productos_categorias ON productos.categoria_id = productos_categorias.id
        WHERE tickets.activo = 1 AND tickets.venta_id IS NULL AND tickets.mesa_id = '".$table_id."'";
                
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function total($table_id) {

        $query =  "SELECT round(SUM(precios.precio_base),2) AS base_imponible, ROUND(SUM(precios.precio_base * ivas.multiplicador),2) AS total, ivas.tipo AS iva
        FROM tickets 
        INNER JOIN precios ON tickets.precio_id = precios.id 
        INNER JOIN ivas ON precios.iva_id = ivas.id
        WHERE tickets.activo = 1 AND tickets.venta_id IS NULL AND tickets.mesa_id = '".$table_id."'
        GROUP BY ivas.tipo";

        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>

<?php

namespace app\Models;

require_once 'core/Connection.php';

use PDO;
use core\Connection;

class Ticket extends Connection {

    public function show($table_id) {

        $query =  "SELECT tickets.id AS id, productos.nombre AS nombre, precios.precio_base AS precio_base, productos.imagen_url 
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

    public function addProduct($price_id, $table_id) 
    {

        $query =  "INSERT INTO tickets (precio_id, mesa_id, activo, creado, actualizado) VALUES (". $price_id.", ".$table_id.", 1, NOW(), NOW())";

        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();
        $id = $this->pdo->lastInsertId();

        $query =  "SELECT tickets.id AS id, productos.nombre AS nombre, precios.precio_base AS precio_base, productos.imagen_url 
        AS imagen_url, productos_categorias.nombre AS categoria
        FROM tickets 
        INNER JOIN precios ON tickets.precio_id = precios.id 
        INNER JOIN productos ON precios.producto_id = productos.id 
        INNER JOIN productos_categorias ON productos.categoria_id = productos_categorias.id
        WHERE tickets.id = ".$id;

        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteProduct($cart_id) 
    {

        $query = "UPDATE tickets SET activo = 0, actualizado = NOW() WHERE id = ".$cart_id;

        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return 'ok';
    }

    public function deleteAllProducts($table_id) 
    {

        $query = "UPDATE tickets SET activo = 0, actualizado = NOW() WHERE mesa_id = ".$table_id;

        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return 'ok';
    }

    public function total($table_id) {

        $query =  "SELECT ROUND(SUM(precios.precio_base),2) AS base_imponible, ROUND(SUM(precios.precio_base * ivas.multiplicador),2) AS total, 
        ROUND(SUM(precios.precio_base * ivas.multiplicador),2) - ROUND(SUM(precios.precio_base),2) AS iva_total , ivas.tipo AS iva
        FROM tickets 
        INNER JOIN precios ON tickets.precio_id = precios.id 
        INNER JOIN ivas ON precios.iva_id = ivas.id
        WHERE tickets.activo = 1 AND tickets.venta_id IS NULL AND tickets.mesa_id = '".$table_id."'
        GROUP BY ivas.tipo";

        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function closeTicket($sale_id, $table_id) 
    {

        $query = "UPDATE tickets SET venta_id = " . $sale_id . ", actualizado = NOW() WHERE mesa_id = ". $table_id ." AND activo = 1 AND venta_id IS NULL";

        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return 'ok';
    }

    public function getServiceDuration($sale_id) 
    {
        $query =  "SELECT TIMESTAMPDIFF(MINUTE, tickets.creado, tickets.actualizado) AS service_duration
        FROM tickets 
        WHERE venta_id = ". $sale_id ." LIMIT 1";

        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getChartData($chart_data){

        switch($chart_data) {
            
            case 'best_dishes':

                $query = "SELECT productos.nombre AS labels, count(productos.nombre) AS data FROM tickets 
                INNER JOIN precios ON tickets.precio_id = precios.id 
                INNER JOIN productos ON precios.producto_id = productos.id 
                INNER JOIN productos_categorias ON productos.categoria_id = productos_categorias.id
                WHERE tickets.activo = 1 AND tickets.venta_id IS NOT NULL AND productos_categorias.nombre NOT IN ('Bebidas calientes', 'Refrescos', 'Bebidas alcohólicas')
                GROUP BY productos.id ORDER BY data desc";
                
                break;

            case 'best_drinks':

                $query = "SELECT productos.nombre AS labels, count(productos.nombre) AS data FROM tickets 
                INNER JOIN precios ON tickets.precio_id = precios.id 
                INNER JOIN productos ON precios.producto_id = productos.id 
                INNER JOIN productos_categorias ON productos.categoria_id = productos_categorias.id
                WHERE tickets.activo = 1 AND tickets.venta_id IS NOT NULL AND productos_categorias.nombre IN ('Bebidas calientes', 'Refrescos', 'Bebidas alcohólicas')
                GROUP BY productos.id ORDER BY data desc ";
                
                break;

            case 'best_categories':

                $query = "SELECT productos_categorias.nombre AS labels, SUM(precios.precio_base) AS data FROM tickets 
                INNER JOIN precios ON tickets.precio_id = precios.id 
                INNER JOIN productos ON precios.producto_id = productos.id 
                INNER JOIN productos_categorias ON productos.categoria_id = productos_categorias.id
                GROUP BY productos_categorias.nombre ORDER BY data desc";
                
                break;
        }
    
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>

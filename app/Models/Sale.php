<?php

namespace app\Models;

require_once 'core/Connection.php';

use PDO;
use core\Connection;

class Sale extends Connection 
{

    public function index() 
    {

        $query =  "SELECT *, ventas.id AS id FROM ventas 
        INNER JOIN mesas ON mesas.id = ventas.mesa_id
        WHERE ventas.activo = 1
        ORDER BY ventas.id DESC";
                
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function show($sale_id) 
    {

        $query =  "SELECT ventas.id AS id, numero_ticket, precio_total_base, precio_total_iva, precio_total, 
        fecha_emision, hora_emision, mesas.numero AS mesa, metodos_pagos.nombre AS metodo_pago  
        FROM ventas 
        INNER JOIN mesas ON mesas.id = ventas.mesa_id 
        INNER JOIN metodos_pagos ON ventas.metodo_pago_id = metodos_pagos.id 
        WHERE ventas.activo = 1
        AND ventas.id = $sale_id";
                
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function showProducts($sale_id) 
    {

        $query =  "SELECT COUNT(tickets.precio_id) AS cantidad, productos.nombre, precios.precio_base, productos.imagen_url FROM `ventas` 
        INNER JOIN tickets ON ventas.id = tickets.venta_id 
        INNER JOIN precios ON tickets.precio_id = precios.id 
        INNER JOIN productos ON precios.producto_id = productos.id 
        INNER JOIN ivas ON precios.iva_id = ivas.id
        WHERE ventas.activo = 1
        AND ventas.id = $sale_id
        GROUP BY precios.id";
                
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function store($table_id, $payment_method_id, $total, $ticket_number) 
    {

        $query =  "INSERT INTO ventas (numero_ticket, precio_total_base, precio_total_iva, precio_total, metodo_pago_id, mesa_id, fecha_emision, hora_emision, activo, creado, actualizado) 
        VALUES (". $ticket_number.", ".$total['base_imponible'].", ".$total['total'] - $total['base_imponible'].", ".$total['total'].",". $payment_method_id.", ". $table_id.", CURDATE(), CURTIME(), 1, NOW(), NOW())";

        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();
        $id = $this->pdo->lastInsertId();

        return $id;
    }

    public function lastTicketNumber()
    {
        $query =  "SELECT numero_ticket FROM ventas ORDER BY id DESC LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateServiceDuration($sale_id, $service_duration)
    {
        $query =  "UPDATE ventas SET duracion_servicio ='$service_duration' WHERE id = $sale_id";
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return 'ok';
    }

    public function filter($table_number, $date)
    {
        if($table_number != null){

            $query =  "SELECT *, ventas.id AS id FROM ventas 
            INNER JOIN mesas ON mesas.id = ventas.mesa_id
            WHERE ventas.activo = 1
            AND mesas.numero = $table_number
            AND ventas.fecha_emision = '$date'
            ORDER BY ventas.id DESC";

        } else{

            $query =  "SELECT *, ventas.id AS id FROM ventas 
            INNER JOIN mesas ON mesas.id = ventas.mesa_id
            WHERE ventas.activo = 1
            AND ventas.fecha_emision = '$date'
            ORDER BY ventas.id DESC";
        }

        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function totalComparedToAverage($table_number, $date)
    {
        if($table_number != null){

            $query =  "SELECT ROUND(SUM(precio_total),2) AS total,
            (SELECT ROUND(AVG(total),2) AS media 
            FROM(SELECT SUM(precio_total) AS total, fecha_emision AS fecha FROM ventas WHERE activo = 1 GROUP BY fecha_emision)subconsulta 
            WHERE DAYNAME(fecha) = DAYNAME('$date')
            GROUP BY DAYNAME(fecha)) AS media
            FROM ventas 
            INNER JOIN mesas ON mesas.id = ventas.mesa_id
            WHERE ventas.activo = 1 AND fecha_emision = '$date'
            AND mesas.numero = $table_number";
    
        } else{

            $query =  "SELECT ROUND(SUM(precio_total),2) AS total,
            (SELECT ROUND(AVG(total),2) AS media 
            FROM(SELECT SUM(precio_total) AS total, fecha_emision AS fecha FROM ventas WHERE activo = 1 GROUP BY fecha_emision)subconsulta 
            WHERE DAYNAME(fecha) = DAYNAME( '$date')
            GROUP BY DAYNAME(fecha)) AS media
            FROM ventas  
            WHERE activo = 1 AND fecha_emision = '$date'";
        }
                
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getChartData($chart_data){

        switch($chart_data) {
            
            case 'sales_by_hour':

                $query =  "SELECT COUNT(*) AS quantity, HOUR(hora_emision) AS labels, SUM(precio_total) AS data FROM ventas WHERE activo = 1 GROUP BY HOUR(hora_emision) ORDER BY HOUR(hora_emision) ASC";

                break;

            case 'sales_by_day':

                $query =  "SELECT COUNT(*) AS quantity, DAYNAME(fecha_emision) AS labels, SUM(precio_total) AS data FROM ventas WHERE activo = 1 GROUP BY DAYNAME(fecha_emision)";

                break;

            case 'sales_by_month':

                $query =  "SELECT COUNT(*) AS quantity, MONTHNAME(fecha_emision) AS labels, SUM(precio_total) AS data FROM ventas WHERE activo = 1 GROUP BY MONTHNAME(fecha_emision)";

                break;

            case 'sales_by_year':

                $query =  "SELECT COUNT(*) AS quantity, YEAR(fecha_emision) AS labels, SUM(precio_total) AS data FROM ventas WHERE activo = 1 GROUP BY YEAR(fecha_emision) ORDER BY YEAR(fecha_emision)";

                break;

            case 'popular_payment_methods':

                $query =  "SELECT metodos_pagos.nombre AS labels, COUNT(ventas.id) AS data FROM ventas
                INNER JOIN metodos_pagos ON ventas.metodo_pago_id = metodos_pagos.id 
                GROUP BY metodos_pagos.nombre ORDER BY data desc";

                break;

            case 'average_service_duration':

                $query =  "SELECT mesas.numero AS labels, AVG(ventas.duracion_servicio) AS data FROM ventas
                INNER JOIN mesas ON ventas.mesa_id = mesas.id 
                GROUP BY mesas.numero ORDER BY data desc";

                break;
        }
    
        
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>

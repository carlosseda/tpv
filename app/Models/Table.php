<?php

namespace app\Models;

require_once 'core/Connection.php';

use PDO;
use core\Connection;

class Table extends Connection {

    public function index() {

        $query =  "SELECT * FROM mesas WHERE activo = 1";
                
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function show($table_id) {

        $query =  "SELECT * FROM mesas WHERE id = $table_id";
                
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function store($id, $number, $ubication, $pax) {

        if(empty($id)){

            $query =  "INSERT INTO mesas (numero, ubicacion, pax, estado, activo, creado, actualizado) VALUES ($number,'$ubication', $pax, 1, 1, NOW(), NOW())";

            $stmt = $this->pdo->prepare($query);
            $result = $stmt->execute();
    
            $query =  "SELECT * FROM mesas WHERE id = ".$this->pdo->lastInsertId();

        }else{

            $query =  "UPDATE mesas SET numero = $number, ubicacion = '$ubication', pax = $pax, actualizado = NOW() WHERE id = $id";

            $stmt = $this->pdo->prepare($query);
            $result = $stmt->execute();

            $query =  "SELECT * FROM mesas WHERE id = $id";
        }
                
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($table_id) {

        $query =  "UPDATE mesas SET activo = 0, actualizado = NOW() WHERE id = $table_id";
                
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return 'ok';
    }

    public function updateState($table_id, $state) {

        $query = "UPDATE mesas SET estado = $state, actualizado = NOW() WHERE id = $table_id ";

        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return 'ok';
    }
}

?>

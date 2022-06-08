<?php

namespace app\Models;

require_once 'core/Connection.php';

use PDO;
use core\Connection;

class Table extends Connection {

    public function index() {

        $query =  "SELECT * FROM mesas WHERE activo = 1 AND estado = 1";
                
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>

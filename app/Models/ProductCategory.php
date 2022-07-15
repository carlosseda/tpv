<?php

namespace app\Models;

require_once 'core/Connection.php';

use PDO;
use core\Connection;

class ProductCategory extends Connection {

    public function index() {

        $query =  "SELECT productos_categorias.id, productos_categorias.nombre, productos_categorias.imagen_url FROM productos_categorias INNER JOIN productos ON productos.categoria_id = productos_categorias.id 
        WHERE productos_categorias.activo = 1 AND productos_categorias.id IN (SELECT id FROM productos WHERE visible = 1) GROUP BY productos_categorias.id";
                
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function show($category_id) {

        $query =  "SELECT * FROM productos_categorias WHERE id = $category_id";
                
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function store($id, $name, $image_url) {

        if(empty($id)){

            $query =  "INSERT INTO productos_categorias (nombre, imagen_url, activo, creado, actualizado) VALUES ('$name','$image_url', 1, NOW(), NOW())";

            $stmt = $this->pdo->prepare($query);
            $result = $stmt->execute();
    
            $query =  "SELECT * FROM productos_categorias WHERE id = ".$this->pdo->lastInsertId();

        }else{

            $query =  "UPDATE productos_categorias SET nombre = '$name', imagen_url = '$image_url', actualizado = NOW() WHERE id = $id";
            
            $stmt = $this->pdo->prepare($query);
            $result = $stmt->execute();

            $query =  "SELECT * FROM productos_categorias WHERE id = $id";
        }
                
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($category_id) {

        $query =  "DELETE FROM productos_categorias WHERE id = $category_id";
                
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute();

        return 'ok';
    }

}

?>

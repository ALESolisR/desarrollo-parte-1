<?php
//requiere la clase para conectar a la bd
require_once '../src/db/Database.php';

//clase marcas
class Marcas {
    private $db;

    //metodo constructor
    public function __construct() {
        $this->db = Database::connect();
    }

    //metodo ver todo
    public function all() {
        $stmt = $this->db->query("SELECT * FROM marcas");
        return $stmt->fetchAll();
    }
    
    //metodo encontrar por id
    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM marcas WHERE idMarca = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }


    //metodo para crear nuevo registro
    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO marcas (anioCreacion, idMarca, nombre, pais, web) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$data['anioCreacion'], $data['idMarca'], $data['nombre'], $data['pais'], $data['web']]);
        return ['id' => $this->db->lastInsertId()];
    }

    //metodo actualizar
    public function update($id, $data) {
        $sql = "UPDATE marcas SET";
        $params = [];
    
        // Construir dinámicamente la consulta y los parámetros según los datos proporcionados
        if (isset($data['anioCreacion'])) {
            $sql .= " anioCreacion = ?,";
            $params[] = $data['anioCreacion'];
        }
        if (isset($data['idMarca'])) {
            $sql .= " idMarca = ?,";
            $params[] = $data['idMarca'];
        }
        if (isset($data['nombre'])) {
            $sql .= " nombre = ?,";
            $params[] = $data['nombre'];
        }
        if (isset($data['pais'])) {
            $sql .= " pais = ?,";
            $params[] = $data['pais'];
        }
        if (isset($data['web'])) {
            $sql .= " web = ?,";
            $params[] = $data['web'];
        }
    
        // Eliminar la última coma y completar la consulta
        $sql = rtrim($sql, ",");
        $sql .= " WHERE idMarca = ?";
        $params[] = $id;
    
        // Ejecutar la consulta
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return ['success' => true];
    }

    //metodo de borrar
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM marcas WHERE idMarca = ?");
        
        $stmt->execute([$id]);
        return ['success' => true];
    }

    //metodo para la vista
    public function vistaMarcas(){
        $stmt = $this->db->query("SELECT * FROM marcas_con_almenos_una_venta");
        return $stmt->fetchAll();
    }
}
?>

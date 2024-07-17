<?php
require_once '../src/db/Database.php';

class Prendas {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function all() {
        $stmt = $this->db->query("SELECT * FROM prendas");
        return $stmt->fetchAll();
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM prendas WHERE idPrenda = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO prendas (categoria, color, idMarca, idPrenda, nombre, precio, stock, talla) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$data['categoria'], $data['color'], $data['idMarca'], $data['idPrenda'],  $data['nombre'],  $data['precio'],  $data['stock'],  $data['talla']]);
        return ['id' => $this->db->lastInsertId()];
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE prendas SET categoria = ?, color = ?, idMarca = ?, idPrenda = ?, nombre = ?, precio = ?, stock = ?, talla = ? WHERE idPrenda = ?");
        $stmt->execute([$data['categoria'], $data['color'], $data['idMarca'], $data['idPrenda'], $data['nombre'], $data['precio'], $data['stock'], $data['talla'], $id]);
        return ['success' => true];
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM prendas WHERE idPrenda = ?");
        $stmt->execute([$id]);
        return ['success' => true];
    }

    //metodo para la vista
    public function vistaPrendas(){
        $stmt = $this->db->query("SELECT * FROM prendas_vendidas_y_cantidad_restante_en_stock");
        return $stmt->fetchAll();
    }
}
?>

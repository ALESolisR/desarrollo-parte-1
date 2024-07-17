<?php
require_once '../src/db/Database.php';

class Ventas {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function all() {
        $stmt = $this->db->query("SELECT * FROM ventas");
        return $stmt->fetchAll();
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM ventas WHERE idVenta = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->db->prepare("INSERT INTO ventas (cantidadVendida, fechaVenta, idPrenda, idVenta, precioUnitario, totalVenta) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$data['cantidadVendida'], $data['fechaVenta'], $data['idPrenda'], $data['idVenta'], $data['precioUnitario'], $data['totalVenta']]);
        return ['id' => $this->db->lastInsertId()];
    }

    public function update($id, $data) {
        $stmt = $this->db->prepare("UPDATE ventas SET cantidadVendida = ?, fechaVenta = ?, idPrenda = ?, idVenta = ?, precioUnitario = ?, totalVenta = ? WHERE idVenta = ?");
        $stmt->execute([$data['cantidadVendida'], $data['fechaVenta'], $data['idPrenda'], $data['idVenta'], $data['precioUnitario'], $data['totalVenta'],  $id]);
        return ['success' => true];
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM ventas WHERE idVenta = ?");
        $stmt->execute([$id]);
        return ['success' => true];
    }

     //metodo para la venta
    public function vistaVentas(){
        $stmt = $this->db->query("SELECT * FROM top_5_marcas_vendidas_y_cantidad_vendida");
        return $stmt->fetchAll();
    }
}
?>

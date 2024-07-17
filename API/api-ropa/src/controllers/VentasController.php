<?php
require_once '../src/models/Ventas.php';

class VentasController {
    private $modeloVentas;

    public function __construct() {
        $this->modeloVentas = new Ventas();
    }

    public function get($id = null) {
        if ($id) {
            echo json_encode($this->modeloVentas->find($id));
        } else {
            echo json_encode($this->modeloVentas->all());
        }
    }

    public function post() {
        $data = json_decode(file_get_contents('php://input'), true);
        echo json_encode($this->modeloVentas->create($data));
    }

    public function put($id) {
        $data = json_decode(file_get_contents('php://input'), true);
        echo json_encode($this->modeloVentas->update($id, $data));
    }

    public function delete($id) {
        echo json_encode($this->modeloVentas->delete($id));
    }

      //funcion nueva para la vista
    public function getVista(){
        echo json_encode($this->modeloVentas->vistaVentas());
    }
}
?>

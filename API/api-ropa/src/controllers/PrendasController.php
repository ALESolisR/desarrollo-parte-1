<?php
require_once '../src/models/Prendas.php';

class PrendasController {
    private $modeloPrenda;

    public function __construct() {
        $this->modeloPrenda = new Prendas();
    }

    public function get($id = null) {
        if ($id) {
            echo json_encode($this->modeloPrenda->find($id));
        } else {
            echo json_encode($this->modeloPrenda->all());
        }
    }

    public function post() {
        $data = json_decode(file_get_contents('php://input'), true);
        echo json_encode($this->modeloPrenda->create($data));
    }

    public function put($id) {
        $data = json_decode(file_get_contents('php://input'), true);
        echo json_encode($this->modeloPrenda->update($id, $data));
    }

    public function delete($id) {
        echo json_encode($this->modeloPrenda->delete($id));
    }

     //funcion nueva para la vista
    public function getVista(){
        echo json_encode($this->modeloPrenda->vistaPrendas());
    }
}
?>

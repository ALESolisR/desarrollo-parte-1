<?php
require_once '../src/models/Marcas.php';

// clase marcas
class MarcasController {
    private $modeloMarcas;

    public function __construct() {
        $this->modeloMarcas = new Marcas();
    }

    // metodo get
    public function get($id = null) {
        if ($id) {
            echo json_encode($this->modeloMarcas->find($id));
        } else {
            echo json_encode($this->modeloMarcas->all());
        }
    }

    //metodo post o guardar
    public function post() {
        $data = json_decode(file_get_contents('php://input'), true);
        echo json_encode($this->modeloMarcas->create($data));
    }

    //metodo actualizar put
    public function put($id) {
        $data = json_decode(file_get_contents('php://input'), true);
        echo json_encode($this->modeloMarcas->update($id, $data));
    }

    //metodo borrar
    public function delete($id) {
        echo json_encode($this->modeloMarcas->delete($id));
    }

    //funcion nueva para la vista
    public function getVista(){
        echo json_encode($this->modeloMarcas->vistaMarcas());
    }
}


?>

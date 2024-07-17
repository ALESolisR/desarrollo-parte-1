<?php
require_once 'controllers/MarcasController.php';
require_once 'controllers/PrendasController.php';
require_once 'controllers/VentasController.php';

$method = $_SERVER['REQUEST_METHOD'];


// remueve / del inicio

$path = trim($_SERVER['PATH_INFO'], '/');
// Split the path into segments
// con EXPLODE: Separamos en secciones el URL(string) por medio del / y conviertiendo en un arreglo

$segmentosDeUrl = explode('/', $path);


//var_dump($_SERVER['PATH_INFO']);
//var_dump($path);
//var_dump($segments);
var_dump($method);
var_dump($path);
var_dump($segmentosDeUrl);


// Obtiene el primer elemento del arreglo
$rutaControlador = array_shift($segmentosDeUrl);
var_dump($rutaControlador);
// Obtiene el ultimo
$id = end($segmentosDeUrl );
var_dump("id pasado en la url: ". $id);

//inicio del if elseif.
if($rutaControlador == "prueba") {

    switch ($method) {
        case 'GET':
            echo json_encode(['Alert' => 'LLamando get de prueba']);
            break;
        default:
            Response::json(['error' => 'Metodo no permitido'], 405);
    }
}

// valida sobre marcas
elseif ($rutaControlador == "marcas") {
    $objMarcas  = new MarcasController();

    switch ($method) {
        case 'GET':
            $objMarcas->get($id);
            break;
        case 'POST':
            $objMarcas->post();
            break;
        case 'PUT':
            $objMarcas->put($id);
            break;
        case 'DELETE':
            $objMarcas->delete($id);
            break;
        default:
            Response::json(['error' => 'Metodo no permitido'], 405);
    } 
}

// tambien valida las prendas
elseif($rutaControlador == "prendas")
{
    $objetoPrendas  = new PrendasController();

    switch ($method) {
        case 'GET':
            $objetoPrendas->get($id);
            break;
        case 'POST':
            $objetoPrendas->post();
            break;
        case 'PUT':
            $objetoPrendas->put($id);
            break;
        case 'DELETE':
            $objetoPrendas->delete($id);
            break;
        default:
            Response::json(['error' => 'Metodo no permitido'], 405);
    }
}
//tambien si valida las ventas
elseif($rutaControlador == "ventas"){
    $objetoVentas  = new VentasController();

    switch ($method) {
        case 'GET':
            $objetoVentas->get($id);
            break;
        case 'POST':
            $objetoVentas->post();
            break;
        case 'PUT':
            $objetoVentas->put($id);
            break;
        case 'DELETE':
            $objetoVentas->delete($id);
            break;
        default:
            Response::json(['error' => 'Metodo no permitido'], 405);
    }
}
//llamado de las vistas 1
elseif($rutaControlador == "vista1"){
    echo("marcas con una venta o mas");
    $objMarcas = new MarcasController();

    switch ($method) {
        case 'GET':
            $objMarcas->getVista($id);
            break;
        default:
            Response::json(['error' => 'Metodo no permitido'], 405);
    }
}
//vista 2
elseif($rutaControlador == "vista2"){
    echo("prendas vendidas y stock restante");
    $objMarcas = new PrendasController();

    switch ($method) {
        case 'GET':
            $objMarcas->getVista($id);
            break;
        default:
            Response::json(['error' => 'Metodo no permitido'], 405);
    }
}

//vista 3
elseif($rutaControlador == "vista3"){
    echo("top 5 marcas mas vendidas");
    $objMarcas = new VentasController();

    switch ($method) {
        case 'GET':
            $objMarcas->getVista($id);
            break;
        default:
            Response::json(['error' => 'Metodo no permitido'], 405);
    }
}
else{
    //sino muestra la vista de error
    include "error/response.html";
}



?>

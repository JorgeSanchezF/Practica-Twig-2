<?php

// Aqui cargamos las dependencias de TWIG que se han instalado
require_once 'vendor/autoload.php';

// Insertamos las dependencias del proyecto
require_once 'autoload.php';
require_once 'Router.php';

session_start();

// Configuramos Twig.
/**
 * $loader contiene la ubicacion de mis vistas de twig
 * 
 * $twig contiene todo el entorno configurado del motor de plantillas.
 *  - Ubicacion de plantillas.
 *  - Variables globales
 *  - etc
 */
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);
$twig->addGlobal('URL', $_SERVER['REQUEST_URI']);

/**
 * Configuracion del sistema de rutas
 */
$route = new Router();
$route->get('/', [IndexController::class, 'index'])
    ->get('/productos', [ProductosController::class, 'index'])
    ->get('/crear-producto', [ProductosController::class, 'create'])
    ->post('/guardar-producto', [ProductosController::class, 'save'])
    ->get('/editar-producto', [ProductosController::class, 'edit'])
    ->post('/update-producto', [ProductosController::class, 'update'])
    ->get('/eliminar-producto', [ProductosController::class, 'destroy'])
    ->get('/clientes', [ClientesController::class, 'index'])
    ->get('/crear-cliente', [ClientesController::class, 'create'])
    ->post('/guardar-cliente', [ClientesController::class, 'save'])
    ->get('/editar-cliente', [ClientesController::class, 'edit'])
    ->post('/update-cliente', [ClientesController::class, 'update'])
    ->get('/eliminar-cliente', [ClientesController::class, 'destroy'])
    ->get('/pedidos', [PedidosController::class, 'index'])
    ->get('/crear-pedido', [PedidosController::class, 'create'])
    ->post('/guardar-pedido', [PedidosController::class, 'save'])
    ->get('/editar-pedido', [PedidosController::class, 'edit'])
    ->post('/update-pedido', [PedidosController::class, 'update'])
    ->get('/eliminar-pedido', [PedidosController::class, 'destroy'])
    ->get('/detalles-pedido', [PedidosController::class, 'estado'])
    ->get('/editar-estado', [PedidosController::class, 'editarEstado'])
    ->post('/update-estado', [PedidosController::class, 'updateEstado']);

$path = parse_url($_SERVER['REQUEST_URI'])['path'];
$path = explode("/", $path);
$url = '';
foreach ($path as $key => $value) {
    // var_dump($value);
    if ($value == 'index.php') {
        // Salir o terminar bucle
    } else {
        if ($key == 0) {
            $url = $value;
        } else {
            $url = $url . '/' . $value;
        }

    }
}
// var_dump($url);
// exit();

$route->resolver_ruta($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
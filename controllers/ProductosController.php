<?php
require_once 'Controller..php';
require_once 'models/Producto.php';
class ProductosController implements Controller
{
    public static function index()
    {
        //funcion que se encarga de comparar los productos dentro del array
        function compararPorPrecio($a, $b)
        {
            return floatval($a['precio']) - floatval($b['precio']);
        }

        //funcion que se encarga de comparar los productos dentro del array
        function compararPorNombre($a, $b)
        {
            return strcmp($a['nombre'], $b['nombre']);
        }
        //funcion que se encarga de comparar los productos dentro del array
        function compararPorStock($a, $b)
        {
            return floatval($b['precio']) - floatval($a['stock']);
        }
        $producto = new Producto;
        $productos = $producto->findAll();
        //si hay variable filtro en la url comprueba si es de precio o de nombre y llama a funcion
        if (isset($_GET['filtro']) && $_GET['filtro'] == 'precio') {
            usort($productos, 'compararPorPrecio');
        }
        if (isset($_GET['filtro']) && $_GET['filtro'] == 'nombre') {
            usort($productos, 'compararPorNombre');
        }
        if (isset($_GET['filtro']) && $_GET['filtro'] == 'stock') {
            usort($productos, 'compararPorStock');
        }

        echo $GLOBALS['twig']->render(
            'producto/productos.twig',
            ['productos' => $productos]
        );


    }
    public static function create()
    {
        echo $GLOBALS['twig']->render(
            'producto/create.twig'
        );
    }
    public static function save()
    {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $datos = [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'stock' => $stock
        ];
        // var_dump($datos);
        // exit();
        $producto = new Producto;
        $producto->store($datos);
        ProductosController::index();
    }
    public static function edit()
    {
        $id = $_GET['id'];
        $producto = new Producto;

        $devolucion = $producto->findById($id);

        echo $GLOBALS['twig']->render(
            'producto/edit.twig',
            ['producto' => $devolucion]
        );

    }
    public static function update()
    {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];
        $datos = [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'stock' => $stock
        ];

        $producto = new Producto;
        $producto->updateById($id, $datos);
        ProductosController::index();
    }
    public static function destroy()
    {
        $id = $_GET['id'];
        $producto = new Producto;
        $producto->destroyById($id);
        ProductosController::index();
    }
}
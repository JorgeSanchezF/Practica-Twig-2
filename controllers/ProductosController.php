<?php
require_once 'Controller..php';
require_once 'models/Producto.php';
class ProductosController implements Controller
{
    public static function index()
    {
        $producto = new Producto;
        $productos = $producto->findAll();
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
        echo $GLOBALS['twig']->render(
            'producto/edit.twig'
        );
    }
    public static function update($id, $datos)
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
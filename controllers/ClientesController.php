<?php
require_once 'models/Cliente.php';
class ClientesController
{
    public static function index()
    {
        $cliente = new Cliente;
        $clientes = $cliente->findAll();
        echo $GLOBALS['twig']->render(
            'cliente/clientes.twig',
            ['clientes' => $clientes]
        );
    }
    public static function create()
    {
        echo $GLOBALS['twig']->render(
            'cliente/create.twig'
        );
    }
    public static function save()
    {
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $direccion = $_POST['direccion'];
        $datos = [
            'dni' => $dni,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'correo' => $correo,
            'direccion' => $direccion
        ];

        $cliente = new cliente;
        $cliente->store($datos);
        ClientesController::index();
    }
    public static function edit()
    {
        $id = $_GET['id'];
        $cliente = new Cliente;
        $devolucion = $cliente->findById($id);
        echo $GLOBALS['twig']->render(
            'cliente/edit.twig',
            ['cliente' => $devolucion]
        );
    }
    public static function update()
    {
        $id = $_POST['id'];
        $dni = $_POST['dni'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $direccion = $_POST['direccion'];
        $datos = [
            'dni' => $dni,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'correo' => $correo,
            'direccion' => $direccion
        ];

        $cliente = new Cliente;
        $cliente->updateById($id, $datos);
        ClientesController::index();
    }
    public static function destroy()
    {
        $id = $_GET['id'];
        $cliente = new Cliente;
        $cliente->destroyById($id);
        ClientesController::index();
    }
}
<?php
require_once 'Controller..php';
require_once 'models/Pedido.php';
class PedidosController implements Controller
{
    public static function index()
    {
        $pedido = new Pedido;
        $pedidos = $pedido->findAll();
        echo $GLOBALS['twig']->render(
            'pedido/pedidos.twig',
            ['pedidos' => $pedidos]
        );
    }
    public static function estado()
    {
        $id = $_GET['id'];
        $pedido = new Pedido;
        $datosPedido = $pedido->findById($id);

        $estado = $pedido->estado($id);
        
        echo $GLOBALS['twig']->render(
            'pedido/estado.twig',
            [
                'pedido' => $datosPedido,
                'datos' => $estado
            ]
        );
    }
    public static function create()
    {
        echo $GLOBALS['twig']->render(
            'pedido/create.twig'
        );

    }
    public static function save()
    {
        $fecha = $_POST['fecha'];
        $id_cliente = $_POST['id_cliente'];
        $direccion_entrega = $_POST['direccion_entrega'];
        $total = $_POST['total'];
        $datos = [
            'fecha' => $fecha,
            'id_cliente' => $id_cliente,
            'direccion_entrega' => $direccion_entrega,
            'total' => $total
        ];
        $pedido = new Pedido;
        $pedido->store($datos);
        PedidosController::index();
    }
    public static function edit()
    {
        $id = $_GET['id'];
        $pedido = new Pedido;
        $devolucion = $pedido->findById($id);
        echo $GLOBALS['twig']->render(
            'pedido/edit.twig',
            ['pedido' => $devolucion]
        );
    }
    public static function update()
    {
        $id = $_POST['id'];
        $fecha = $_POST['fecha'];
        $id_cliente = $_POST['id_cliente'];
        $direccion_entrega = $_POST['direccion_entrega'];
        $total = $_POST['total'];
        $datos = [
            'fecha' => $fecha,
            'id_cliente' => $id_cliente,
            'direccion_entrega' => $direccion_entrega,
            'total' => $total
        ];
        $pedido = new Pedido;
        $pedido->updateById($id, $datos);
        PedidosController::index();
    }
    public static function destroy()
    {
        $id = $_GET['id'];
        $pedido = new Pedido;
        $pedido->destroyById($id);
        PedidosController::index();
    }
}
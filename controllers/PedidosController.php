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

    public static function create()
    {
        echo $GLOBALS['twig']->render(
            'pedido/create.twig'
        );

    }
    public static function save()
    {

        $id_cliente = $_POST['id_cliente'];
        $direccion_entrega = $_POST['direccion_entrega'];
        $total = $_POST['total'];
        $datos = [

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
        $datosPedido = $pedido->findById($id);

        $estado = $pedido->estado($id);

        echo $GLOBALS['twig']->render(
            'pedido/edit.twig',
            [
                'pedido' => $datosPedido,
                'datos' => $estado
            ]
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
    public static function editarEstado()
    {
        $id = $_GET['id'];
        $pedido = new Pedido;
        $datosPedido = $pedido->findById($id);

        $estado = $pedido->estado($id);

        echo $GLOBALS['twig']->render(
            'pedido/editarEstado.twig',
            [
                'pedido' => $datosPedido,
                'datos' => $estado
            ]
        );
    }
    public static function updateEstado()
    {
        $id = $_POST['id'];
        $estado = $_POST['estadoPedido'];

        $pedido = new Pedido;
        $pedido->updateEstado($id, $estado);
        PedidosController::index();

    }
    public static function update()
    {
        $id = $_POST['id'];
        $fecha = $_POST['fecha'];
        $id_cliente = $_POST['id_cliente'];
        $direccion_entrega = $_POST['direccion_entrega'];
        $estado = $_POST['estado'];
        $total = $_POST['total'];

        switch ($estado) {

            case 'Enviado':
                $estado_id = 2;
                break;
            case 'Entregado':
                $estado_id = 3;
                break;
            case 'Cancelado':
                $estado_id = 4;
                break;
            case 'En preparación':
                $estado_id = 5;
                break;
            case 'En camino':
                $estado_id = 6;
                break;
            case 'Listo para envío':
                $estado_id = 7;
                break;
            case 'En revisión':
                $estado_id = 8;
                break;
            case 'Devolución solicitada':
                $estado_id = 9;
                break;
            case 'Recibido con éxito':
                $estado_id = 10;
                break;
            case 'En espera de pago':
                $estado_id = 11;
                break;
            case 'En revisión técnica':
                $estado_id = 12;
                break;
            case 'En preparación para envío':
                $estado_id = 13;
                break;
            case 'Entregado parcialmente':
                $estado_id = 14;
                break;
            case 'En cuarentena':
                $estado_id = 15;
                break;
            default:
                $estado_id = 1;
        }
        $datos = [
            'fecha' => $fecha,
            'id_cliente' => $id_cliente,
            'direccion_entrega' => $direccion_entrega,
            'total' => $total,
            'estado' => $estado_id
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
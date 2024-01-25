<?php
require_once 'Modelo.php';
require_once 'db/Database.php';
class Pedido implements Model
{
    private $id;
    private $fecha;
    private $id_cliente;
    private $direccion_entrega;
    private $total;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getIdCliente()
    {
        return $this->id_cliente;
    }

    public function setIdCliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;
    }

    public function getDireccionEntrega()
    {
        return $this->direccion_entrega;
    }

    public function setDireccionEntrega($direccion_entrega)
    {
        $this->direccion_entrega = $direccion_entrega;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }


    public function __construct()
    {

    }


    public function findAll()
    {
        $database = new Database("root", "", "localhost", 3308);
        $devolver = $database->getPedidos();
        return $devolver;
    }
    public function findById($id)
    {
        $database = new Database("root", "", "localhost", 3308);
        $devolver = $database->getPedidoById($id);
        return $devolver;
    }
    public function store($datos)
    {
        $database = new Database("root", "", "localhost", 3308);
        $database->storePedido($datos);

    }
    public function updateById($id, $datos)
    {
        $database = new Database("root", "", "localhost", 3308);
        $database->updatePedido($id, $datos);

    }
    public function destroyById($id)
    {
        $database = new Database("root", "", "localhost", 3308);
        $database->destroyPedido($id);

    }
    public function estado($id)
    {
        $database = new Database("root", "", "localhost", 3308);
        $devolver = $database->estadoPedido($id);
        return $devolver;
    }

}
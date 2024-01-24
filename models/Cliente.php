<?php
require_once 'Modelo.php';
require_once 'db/Database.php';
class Cliente implements Model
{
    private $id;
    private $dni;
    private $nombre;
    private $apellido;
    private $correo;
    private $direccion;

    public function __construct()
    {

    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getDni()
    {
        return $this->dni;
    }
    public function setDni($dni)
    {
        $this->dni = $dni;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }
    public function getCorreo()
    {
        return $this->correo;
    }
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }
    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }
    public function findAll()
    {
        $database = new Database("root", "", "localhost", 3308);
        $devover = $database->getClientes();
        return $devover;
    }
    public function findById($id)
    {
        $database = new Database("root", "", "localhost", 3308);
        $devolver = $database->getClienteById($id);
        return $devolver;

    }
    public function store($datos)
    {

        $database = new Database("root", "", "localhost", 3308);
        $database->storeCliente($datos);

    }
    public function updateById($id, $datos)
    {
        $database = new Database("root", "", "localhost", 3308);
        $database->updateCliente($id, $datos);

    }
    public function destroyById($id)
    {
        $database = new Database("root", "", "localhost", 3308);
        $database->destroyCliente($id);

    }
}
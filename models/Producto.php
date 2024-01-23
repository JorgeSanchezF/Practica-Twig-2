<?php
require_once 'Modelo.php';
require_once 'db/Database.php';
class Producto implements Model
{
    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;

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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function findAll()
    {
        $database = new Database("root", "", "localhost", 3308);
        $devover = $database->getProductos();
        return $devover;
    }
    public function findById($id)
    {
        $database = new Database("root", "", "localhost", 3308);
        $devolver = $database->getProductoById($id);
        return $devolver;

    }
    public function store($datos)
    {

        $database = new Database("root", "", "localhost", 3308);
        $database->storeProducto($datos);

    }
    public function updateById($id, $datos)
    {
        $database = new Database("root", "", "localhost", 3308);
        $database->updateProducto($id, $datos);

    }
    public function destroyById($id)
    {
        $database = new Database("root", "", "localhost", 3308);
        $database->destroyProducto($id);

    }
}

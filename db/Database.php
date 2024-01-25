<?php
class Database
{
    private $user;
    private $password;
    private $host;
    private $port;

    public function getUser(): string
    {
        return $this->user;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function getHost(): string
    {
        return $this->host;
    }
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * En el constructor recibo los parametros de conexion a la BD
     */
    public function __construct($user, $password, $host, $port)
    {
        $this->user = $user;
        $this->password = $password;
        $this->host = $host;
        $this->port = $port;
        // var_dump($this->$user);
        // var_dump($this->$password);
        // var_dump($this->$host);
        // var_dump($this->$port);
        // exit();
    }
    public function conectar(): PDO
    {

        $db = new \PDO(
            "mysql:host=" . $this->getHost() . ";port=" . $this->getPort() . ";dbname=t2p1",
            $this->getUser(),
            $this->getPassword(),
            array(
                \PDO::ATTR_EMULATE_PREPARES => false,
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
            )
        );

        return $db;
    }
    /**
     * Realiza la desconexion a la base de datos
     */
    public static function desconectar()
    {

        return null;
    }
    /**
     * 
     * 
     * PRODUCTOS
     * 
     * 
     */
    public function sortProductosByPrecio()
    {
        $db = $this->conectar();
        $query = "SELECT * FROM productos ORDER BY precio ASC";
        $stmt = $db->prepare($query);
        $stmt->execute();

        // Desconectar
        $db = $this->desconectar();

        // Transforma a clave-valor
        $devolver = $stmt->fetchAll();

        // Ejecutar
        // Devolver resultados
        return $devolver;
    }
    public function sortProductosByNombre()
    {
        $db = $this->conectar();
        $query = "SELECT * FROM productos ORDER BY nombre ASC";
        $stmt = $db->prepare($query);
        $stmt->execute();

        // Desconectar
        $db = $this->desconectar();

        // Transforma a clave-valor
        $devolver = $stmt->fetchAll();

        // Ejecutar
        // Devolver resultados
        return $devolver;
    }
    public function sortProductosByStock()
    {
        $db = $this->conectar();
        $query = "SELECT * FROM productos ORDER BY stock DESC";
        $stmt = $db->prepare($query);
        $stmt->execute();

        // Desconectar
        $db = $this->desconectar();

        // Transforma a clave-valor
        $devolver = $stmt->fetchAll();

        // Ejecutar
        // Devolver resultados
        return $devolver;
    }
    public function getProductos()
    {
        $db = $this->conectar();
        $query = "SELECT * FROM productos";
        $stmt = $db->prepare($query);
        $stmt->execute();

        // Desconectar
        $db = $this->desconectar();

        // Transforma a clave-valor
        $devolver = $stmt->fetchAll();

        // Ejecutar
        // Devolver resultados
        return $devolver;
    }
    public function getProductoById($id)
    {
        $db = $this->conectar();
        $query = "SELECT * FROM productos WHERE id=" . $id;
        $stmt = $db->prepare($query);
        $stmt->execute();

        // Desconectar
        $db = $this->desconectar();

        // Transforma a clave-valor
        $devolver = $stmt->fetch();

        // Ejecutar
        // Devolver resultados
        return $devolver;
    }
    public function storeProducto($datos)
    {

        $nombre = $datos['nombre'];
        $descripcion = $datos['descripcion'];
        $precio = $datos['precio'];
        $stock = $datos['stock'];
        $db = $this->conectar();
        $query = "INSERT INTO productos (nombre, descripcion, precio, stock) VALUES ('$nombre', '$descripcion', $precio, $stock)";

        $stmt = $db->prepare($query);
        $stmt->execute();

        // Desconectar
        $db = $this->desconectar();

    }
    public function updateProducto($id, $datos)
    {

        $nombre = $datos['nombre'];
        $descripcion = $datos['descripcion'];
        $precio = $datos['precio'];
        $stock = $datos['stock'];


        $db = $this->conectar();
        $query = "UPDATE productos
        SET nombre = '$nombre',descripcion = '$descripcion',precio = $precio,stock = $stock WHERE id = $id";
        $stmt = $db->prepare($query);
        $stmt->execute();

        // Desconectar
        $db = $this->desconectar();

    }
    public function destroyProducto($id)
    {
        $db = $this->conectar();
        $query = "DELETE FROM productos WHERE id=" . $id;

        $stmt = $db->prepare($query);
        $stmt->execute();

        // Desconectar
        $db = $this->desconectar();

    }
    /**
     * 
     * 
     * CLIENTES
     * 
     * 
     */
    public function getClientes()
    {
        $db = $this->conectar();
        $query = "SELECT * FROM clientes";
        $stmt = $db->prepare($query);
        $stmt->execute();

        // Desconectar
        $db = $this->desconectar();

        // Transforma a clave-valor
        $devolver = $stmt->fetchAll();

        // Ejecutar
        // Devolver resultados
        return $devolver;
    }
    public function getClienteById($id)
    {
        $db = $this->conectar();
        $query = "SELECT * FROM clientes WHERE id=" . $id;
        $stmt = $db->prepare($query);
        $stmt->execute();

        // Desconectar
        $db = $this->desconectar();

        // Transforma a clave-valor
        $devolver = $stmt->fetch();

        // Ejecutar
        // Devolver resultados
        return $devolver;
    }
    public function storeCliente($datos)
    {
        $dni = $datos['dni'];
        $nombre = $datos['nombre'];
        $apellido = $datos['apellido'];
        $correo = $datos['correo'];
        $direccion = $datos['direccion'];

        $db = $this->conectar();
        $query = "INSERT INTO clientes (dni ,nombre, apellido, correo, direccion) VALUES ('$dni', '$nombre', '$apellido', '$correo', '$direccion')";

        $stmt = $db->prepare($query);
        $stmt->execute();

        // Desconectar
        $db = $this->desconectar();

    }
    public function updateCliente($id, $datos)
    {
        $dni = $datos['dni'];
        $nombre = $datos['nombre'];
        $apellido = $datos['apellido'];
        $correo = $datos['correo'];
        $direccion = $datos['direccion'];

        $db = $this->conectar();
        $query = "UPDATE clientes SET nombre = '$nombre',apellido = '$apellido',correo = '$correo',direccion = '$direccion' WHERE id = $id";
        $stmt = $db->prepare($query);
        $stmt->execute();

        // Desconectar
        $db = $this->desconectar();

    }
    public function destroyCliente($id)
    {
        $db = $this->conectar();
        $query = "DELETE FROM clientes WHERE id=" . $id;

        $stmt = $db->prepare($query);
        $stmt->execute();

        // Desconectar
        $db = $this->desconectar();

    }
    /**
     * 
     * PEDIDOS
     * 
     */
    public function getPedidos()
    {
        $db = $this->conectar();
        $query = "SELECT * FROM pedidos";

        $stmt = $db->prepare($query);
        $stmt->execute();
        $devolver = $stmt->fetchAll();
        // Desconectar
        $db = $this->desconectar();
        return $devolver;
    }
    public function getPedidoById($id)
    {
        $db = $this->conectar();
        $query = "SELECT * FROM pedidos WHERE id= $id";

        $stmt = $db->prepare($query);
        $stmt->execute();
        $devolver = $stmt->fetch();
        // Desconectar
        $db = $this->desconectar();
        return $devolver;
    }
    public function storePedido($datos)
    {
        $fecha = $datos['fecha'];
        $id_cliente = $datos['id_cliente'];
        $direccion_entrega = $datos['direccion_entrega'];
        $total = $datos['total'];
        $db = $this->conectar();
        $query = "INSERT INTO pedidos(fecha, id_cliente, direccion_entrega, total)VALUES('$fecha', $id_cliente,'$direccion_entrega', $total)";

        $stmt = $db->prepare($query);
        $stmt->execute();

        // Desconectar
        $db = $this->desconectar();
    }
    public function updatePedido($id, $datos)
    {
        $fecha = $datos['fecha'];
        $id_cliente = $datos['id_cliente'];
        $direccion_entrega = $datos['direccion_entrega'];
        $total = $datos['total'];

        $db = $this->conectar();
        $query = "UPDATE pedidos SET fecha = '$fecha',id_cliente = $id_cliente,direccion_entrega = '$direccion_entrega',total = $total WHERE id = $id";
        $stmt = $db->prepare($query);
        $stmt->execute();

        // Desconectar
        $db = $this->desconectar();

    }
    public function destroyPedido($id)
    {
        $db = $this->conectar();
        $query = "DELETE FROM pedidos WHERE id=" . $id;

        $stmt = $db->prepare($query);
        $stmt->execute();

        // Desconectar
        $db = $this->desconectar();

    }
    public function estadoPedido($id)
    {
        $db = $this->conectar();
        $query = "SELECT nombre FROM estado JOIN pedido_has_estado ON estado.id=pedido_has_estado.id_estado JOIN pedidos ON pedidos.id=pedido_has_estado.id_pedido WHERE pedidos.id=$id";

        $stmt = $db->prepare($query);
        $stmt->execute();

        $devolver = $stmt->fetch();

        // Desconectar
        $db = $this->desconectar();
        return $devolver;
    }
}

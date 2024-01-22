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
        $query = "SELECT * FROM productos WHERE id= " . $id;

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
        $query = "INSERT INTO productos(nombre,descripcion,precio,stock) VALUES('" . $nombre . "','" . $descripcion . "','" . $precio . "','" . $stock . "')";

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
        $query = "UPDATE FROM productos(nombre,descripcion,precio,stock)SET(nombre='" . $nombre . "',descripcion='" . $descripcion . ",precio='" . $precio . "','stock='" . $stock . "') WHERE id=" . $id;
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
}

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
}
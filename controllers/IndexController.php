<?php
class IndexController
{
    public static function index()
    {
        echo $GLOBALS['twig']->render('index.twig');
        // include 'templates/index.twig';
    }
}
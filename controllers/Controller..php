<?php
interface Controller
{
    public static function index();
    public static function create();
    public static function save();
    public static function edit();
    public static function update($id, $datos);
    public static function destroy();
}

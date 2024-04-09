<?php
class conexion
{
    public static function mysql()
    {
        try {
            $x = new PDO("mysql:host=localhost;dbname=Prueba;charset=utf8", "root", "");
            $x->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $x;
        } catch (PDOException $e) {
            die("Error en la conexión a la base de datos MySQL Discol: " . $e->getMessage());
        };
    }
}

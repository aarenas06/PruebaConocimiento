<?php
require_once '../includes/conexion.php';

class modelo
{
    public $CNX1;
    public $CNX2;


    public function __construct()
    {
        $this->CNX1 = conexion::mysql();
    }
    public function tbprin()
    {
        $sql = "Select * from listregistro";
        $sql = $this->CNX1->prepare($sql);
        $sql->execute();
        $row = $sql->fetchAll(PDO::FETCH_NAMED);
        return $row;
    }
    public function InsertData($data)
    {
        try {

            $columnas = implode(", ", array_keys($data));
            $valores = array_values($data);
            $placeholders = implode(", ", array_fill(0, count($valores), "?"));
            $sql = "INSERT INTO listregistro ($columnas) VALUES ($placeholders)";
            $stmt = $this->CNX1->prepare($sql);
            $stmt->execute($valores);
            return 1;
        } catch (PDOException $e) {
            die("Error al insertar los datos: " . $e->getMessage());
            return 0;
        }
    }
    public function Delete($id)
    {
        $sql = "DELETE FROM listregistro WHERE IdListRegistro = ?";
        $sql = $this->CNX1->prepare($sql);
        if ($sql->execute([$id])) {
            return 1; // Retorna 1 si se elimina correctamente
        } else {
            return 0; // Retorna 0 si hay un error al eliminar
        }
    }
}

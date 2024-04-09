<?php
require_once '../model/model.php';

class Controller
{
    public $MODEL;

    public function __construct()
    {
        $this->MODEL = new modelo();
    }
    public function tbprin()
    {
        $data = $this->MODEL->tbprin();
        if ($data) {
            include('../tables/tbprin.php');
        } else {
            echo 'No hay registros';
        }
    }
    public function InsertData()
    {
        $data = array(
            'NombreUser' => $_POST['nombre'],
            'Prueba1' => $_POST['Parcial1'],
            'Prueba2' => $_POST['Parcial2'],
            'Prueba3' => $_POST['Parcial3'],
            'Promedio' => $_POST['PromedioSet'],
        );
        $Save = $this->MODEL->InsertData($data);
        print_r($Save);
    }
    public function Delete()
    {
        $ejecutar = $this->MODEL->Delete($_POST['id']);
        print_r($ejecutar);
    }
}
$controller = new Controller();

if (isset($_POST['funcion'])) {
    call_user_func(array(new Controller, $_POST['funcion']));
}

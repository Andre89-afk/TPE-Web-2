<?php

include_once 'app/modelo/modelobolso.php';
include_once 'app/vista/vistabolso.php';


class ControladorBolso{

    private $modelo;
    private $vista;

    function __constructor(){
        $this->modelo= new ModeloBolso();
        $this->vista= new VistaBolso();
    }


    
    function ObtenerBolsos(){
        $bolsos=$this->modelo->MostrarBolsos();
        $this->vista->ObtenerBolsos($bolsos);
}

function AgregarBolsos(){
    $nombre= $_POST['nombre'];
    $color=$_POST['color'];
    $precio= $_POST['precio'];

    if(empty($nombre) || empty($color) || empty($precio)){
        $this->vista->error("Error campos vacios");
    }

    $id=$this->modelo->InsertarBolsos($nombre, $color, $precio);
    header('Location: ' .BASE_URL);
    
}

function RemoverBolsos($id){
    $this->modelo->EliminarBolso($id);
    header('Location: ' .BASE_URL);
}

}
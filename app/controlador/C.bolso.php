<?php

include_once 'app/modelo/M.bolso.php';
include_once 'app/vista/V.bolso.php';

class ControladorBolso{

    private $modelo;
    private $vista;

    function __construct($res) {
        $this->modelo= new ModeloBolso();
        $this->vista= new VistaBolso();
    }

    function ObtenerBolsos() {
        $bolsos =$this->modelo->MostrarBolsos();
        $this->vista->ObtenerBolsos($bolsos);
    }   

    function AgregarBolsos() {
        $nombre = $_POST['nombre'];
        $color = $_POST['color'];
        $precio = $_POST['precio'];
        $id_categoria = $_POST['categoria'];

        if (empty($nombre) || empty($color) || empty($precio) || empty($id_categoria)) {
            $this->vista->error("Error campos vacios");
            die();
        } 
        $id = $this->modelo->InsertarBolsos($nombre, $color, $precio, $id_categoria);

        header('Location: bolsos');
        exit;
    }

    function RemoverBolsos($id) {
        $this->modelo->EliminarBolso($id);
        header('Location: '.BASE_URL);
        exit;
    }

    function Detalles($id) {
        $bolso = $this->modelo->BuscarDetalles($id);
        $this->vista->VistaBolso($bolso);  
    }
        
    function MostrarFormulario() {
        $categorias = $this->modelo->ObtenerCategorias(); 
        $this->vista->MostrarFormulario($categorias); 
    }    
    }
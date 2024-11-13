<?php

include_once 'app/modelo/M.categoria.php';
include_once 'app/vista/V.categoria.php';

class ControladorCategoria{
    private $modelo;
    private $vista;

    function __construct() {
        $this->modelo= new ModeloCategoria();
        $this->vista= new VistaCategoria();
        
    }

    function MostrarCategorias(){
        $categorias = $this->modelo->ObtenerCategorias();
        $this->vista->MostrarCategorias($categorias); 
    }

    public function ObtenerBolsosPorCategoria($id_categoria) {
        $bolsos = $this->modelo->MostrarBolsosPorCategoria($id_categoria);
        $this->vista->ObtenerBolsosPorCategoria($bolsos);
    }

    function RemoverCategoria($id) {
        $this->modelo->EliminarCategoria($id);
        header('Location:' .BASE_URL);
        exit;
    }

    function MostrarFormularioDeCategoria() {
        $this->vista->MostrarFormularioDeCategoria(); 
    }

    function MostrarFormularioDeEdicion($id) {
        $categoria = $this->modelo->ObtenerCategoriaPorId($id);
        
        if ($categoria) {
            $this->vista->MostrarFormularioDeEdicion($categoria);
        } else {
            echo "No se encontró la categoría para editar.";
        }
    }
    

    function AgregarCategoria($categoria) {
        if (isset($categoria) && !empty($categoria)) {
        $id_categoria = $this->modelo->InsertarCategoria($categoria);
        header('Location: ' . BASE_URL . 'categorias');
        exit;
    } else {
        echo "<p>Error: El campo categoría no puede estar vacío.</p>";
        }
    }
 
    function ActualizarCategoria($id) {
    if (isset($_POST['categoria'])) {
        $categoria = $_POST['categoria'];
        $this->modelo->ActualizarCategoria($categoria, $id);
        header('Location: ' . BASE_URL . 'categorias');
        exit;
    } else {
        echo "<p>Error: No se enviaron los datos correctamente.</p>";
        }
    }     
} 
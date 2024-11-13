<?php
require_once 'app/controlador/C.bolso.php';
require_once 'app/controlador/C.categoria.php';
require_once 'app/controlador/C.inicio.php';
require_once 'app/middlewares/verificacionusuario.php';
require_once 'app/middlewares/sesionusuario.php';
require_once 'libs/response.php';


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] .':'. $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$res =new Response();

$action= 'bolsos';
if (!empty($_GET["action"])){
    $action = $_GET["action"];
}

$params = explode('/',$action);

switch($params[0]){
    case 'bolsos':
        sesionusuario($res);
        $controlador= new ControladorBolso($res);
        $controlador->ObtenerBolsos();
        break;
    case 'agregar':
        sesionusuario($res);
        verificacionusuario($res);
        $controlador= new ControladorBolso($res);
        $controlador->AgregarBolsos();
        break;
    case 'eliminar':
        sesionusuario($res);
        verificacionusuario($res);
        $controlador= new ControladorBolso($res);
        $id=$params[1];
        $controlador->RemoverBolsos($id); 
        break;
    case 'detalles':
        $controlador = new ControladorBolso($res);
        $id =$params[1];
        $controlador->Detalles($id);
        break;
    case 'formulario':
        $controlador= new ControladorBolso($res);
        $controlador->MostrarFormulario();
        break;
    case 'categorias':
        $controlador = new ControladorCategoria();
        $controlador->MostrarCategorias();
        break;
    case 'categoria':
        $id_categoria = $params[1];  
        $controlador = new ControladorCategoria();
        $controlador->ObtenerBolsosPorCategoria($id_categoria);
        break;
    case 'iniciar':
        $controlador = new ControladorInicio();
        $controlador->MostrarInicioS();
        break;
    case 'inicio':
        $controlador = new ControladorInicio();
        $controlador->Inicio();
        break;
    case 'registrar':
        $controlador = new ControladorInicio();
        $controlador->Registrar();
        break;
    case 'registro':
        $controlador = new ControladorInicio();
        $controlador->FormRegistro();
        break;
    case 'cuenta':
        $controlador= new ControladorInicio();
        $controlador->Cuenta();
        break;
    case 'logout':
        $controlador = new ControladorInicio();
        $controlador->logout();
        break;
    case 'eliminarcategoria':
        sesionusuario($res);
        verificacionusuario($res);
        $controlador= new ControladorCategoria($res);
        $id=$params[1];
        $controlador->RemoverCategoria($id); 
        break;
    case 'formulario2':
        $controlador= new ControladorCategoria($res);
        $controlador->MostrarFormularioDeCategoria();
        break;
    case 'agregarcategoria':
        sesionusuario($res);
        verificacionusuario($res);
        $categoria = $_POST['categoria'] ?? '';
        $controlador = new ControladorCategoria($res);
        $controlador->AgregarCategoria($categoria); 
        break;
    case 'editarcategoria':
        sesionusuario($res);
        verificacionusuario($res);
        $controlador = new ControladorCategoria($res);
        $id = $params[1];  
        $controlador->MostrarFormularioDeEdicion($id); 
        break;  
    case 'actualizarcategoria':
        sesionusuario($res);
        verificacionusuario($res);
        $id = $params[1];
        $controlador = new ControladorCategoria($res);
        $controlador->ActualizarCategoria($id); 
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo ("404 Page Not Found");
        break;
}

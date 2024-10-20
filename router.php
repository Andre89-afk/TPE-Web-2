<?php
require_once 'app/controlador/controladorbolso.php';


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] .':'. $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');



$action= 'bolsos';
if (!empty($_GET["action"])){
    $action = $_GET["action"];
}

$params = explode('/',$action);

switch($params[0]){
    case 'bolsos':
        $controlador= new ControladorBolso();
        $controlador->ObtenerBolsos();
        break;
    case 'agregar':
        $controlador= new ControladorBolso();
        $controlador->AgregarBolsos();
        break;
    case 'eliminar':
        $controlador= new ControladorBolso();
        $controlador->RemoverBolsos($params[1]); 
        break;
    default:
    echo "404 Page Not Found";
    break;
}

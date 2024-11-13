<?php

include_once 'app/modelo/M.usuario.php';
include_once 'app/vista/V.inicio.php';


class ControladorInicio{

    private $modelo;
    private $vista;

    function __construct() {
        $this->modelo= new ModeloUsuario();
        $this->vista= new VistaInicioC();  
    }

    function MostrarInicioS() {
        $this->vista->MostrarInicioS();
    }   

    function Inicio() {
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];
        $email = $_POST['email'];

        if (empty($usuario) || empty($email) || empty($contraseña)) {
            $this->vista->error("Error campos vacios");
            return;
        }
       
        $this->modelo->ObtenerConexion();
        $usuarioBD = $this->modelo->ObtenerEmail($email);
    
        if ($usuarioBD && password_verify($contraseña, $usuarioBD->Contraseña)) {
            session_start();
            $_SESSION['id_usuario'] = $usuarioBD->id_usuario;
            $_SESSION['usuario'] = $usuarioBD->Nombre;
            $_SESSION['email'] = $usuarioBD->Email;
            header('Location: bolsos');
            exit;
        } else {
            $this->vista->error('Información Incorrecta: Contraseña inválida');
        }
    }
    
        /*--Controlador Para Registrarse--*/
    function FormRegistro() {
        $this->vista->FormRegistro();
    }
                              
    function Registrar() {
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $contraseña = $_POST['contraseña'];
        $edad = $_POST['edad'];

        if (empty($usuario) || empty($email) || empty($contraseña) || empty($edad)) {
            $this->vista->error("Por favor, complete todos los campos.");
            return;
        }

        if ($this->modelo->VerificarEmailExistente($email)) {
            $this->vista->error("El correo electrónico ya está en uso. Por favor, ingrese otro.");
            return;
        }

        $contraseñaHash = password_hash($contraseña, PASSWORD_DEFAULT);
        
        if ($this->modelo->RegistrarUsuario($usuario, $email, $contraseñaHash, $edad)) {
            header('Location: bolsos');
            exit;
        } else {
            $this->vista->error("Error al registrar el usuario. Intenta nuevamente.");
        }
    }

    /*--Registro y desloguearse--*/
    function Cuenta(){
        require 'templates/cuenta.phtml'; 
    }

    function logout() {
        session_start(); 
        session_unset(); 
        session_destroy(); 
        header('Location: bolsos'); 
        exit;
    }
    }
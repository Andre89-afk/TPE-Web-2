<?php

class ModeloUsuario{


    function ObtenerConexion(){
        $db=new PDO('mysql:host=localhost; dbname=comple2;charset=utf8','root','');
        return $db;
    }
  
    function ObtenerEmail($email) {
        $db= $this->ObtenerConexion();
        $query = $db->prepare('SELECT * FROM usuarios WHERE Email = ?');
        $query->execute([$email]);
        $usuario=$query->fetch(PDO::FETCH_OBJ);
        return  $usuario;
    }
    
    /*--Modelo de Registro--*/
    function VerificarEmailExistente($email) {
        $db = $this->ObtenerConexion();
        $query = $db->prepare('SELECT * FROM usuarios WHERE Email = ?');
        $query->execute([$email]);
        $usuario = $query->fetch(PDO::FETCH_OBJ);
        return $usuario ? true : false;  // Si el usuario existe, devuelve true
    }

    // Método para registrar al usuario
    function RegistrarUsuario($usuario, $email, $contraseñaHash, $edad) {
        try {
            $db = $this->ObtenerConexion();
            $query = $db->prepare("INSERT INTO usuarios (Nombre, Email, Contraseña, Nacimiento) VALUES (?, ?, ?, ?)");
            $query->execute([$usuario, $email, $contraseñaHash, $edad]);
            return true;
        } catch (PDOException $e) {
            echo "Error al ejecutar la consulta: " . $e->getMessage();  // Muestra el error si ocurre
            return false;
        }
    } 
}
<?php

class ModeloBolso{

     private function ObtenerConexion(){
        return new PDO('mysql:host=localhost; dbname=comple2;charset=utf8','root','');
    }


    function MostrarBolsos() {

        $db =$this->ObtenerConexion();

        $query= $db->prepare('SELECT * FROM bolsos');
        $query->execute();
        
        $bolsos= $query->fetchAll(PDO::FETCH_OBJ);
    
        return $bolsos;
    }

    function InsertarBolsos($nombre, $color, $precio){
        $db=$this->ObtenerConexion();
    
        $query= $db->prepare('INSERT INTO bolsos (Nombre, Color, Precio) VALUES(?,?,?)');
        $query->execute([$nombre, $color, $precio]);
    
        return $db->lastInsertId(); 
    }

    function EliminarBolso($id){
        $db=$this->ObtenerConexion();
        $query= $db->prepare('DELETE FROM bolsos  WHERE id_bolso= ?');
        $query->execute([$id]);
    }

}
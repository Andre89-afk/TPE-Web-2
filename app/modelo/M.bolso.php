<?php

class ModeloBolso{

   private function ObtenerConexion(){
        $db=new PDO('mysql:host=localhost; dbname=comple2;charset=utf8','root','');
        return $db;
    }

    function MostrarBolsos() {
        $db= $this->ObtenerConexion();
        $query= $db->prepare(' SELECT bolsos.id_bolso, bolsos.Nombre, bolsos.Color, bolsos.Precio, categorias.Categoria 
        FROM bolsos
        INNER JOIN categorias ON bolsos.id_categoria = categorias.id_categoria');
        $query->execute();
        $bolsos= $query->fetchAll(PDO::FETCH_OBJ);
    
        return $bolsos;
    }

    function InsertarBolsos($nombre, $color, $precio, $id_categoria){
        $db= $this->ObtenerConexion();
        $query= $db->prepare('INSERT INTO `bolsos` (Nombre, Color, Precio, id_categoria) VALUES(?, ?, ?, ?)');
        $query->execute([$nombre, $color, $precio, $id_categoria]);
        return $db->lastInsertId();
    }

    function EliminarBolso($id){
        $db=$this->ObtenerConexion();
        $query= $db->prepare('DELETE FROM bolsos  WHERE id_bolso= ?');
        $query->execute([$id]);
    }

    function BuscarDetalles($id) {
        $db = $this->ObtenerConexion();
        $query = $db->prepare('SELECT * FROM bolsos WHERE id_bolso = ?');
        $query->execute([$id]);
        
        return $query->fetch(PDO::FETCH_OBJ);
    }
    
    function ObtenerCategorias() {
        $db = $this->ObtenerConexion();
        $query = $db->prepare('SELECT * FROM categorias');
        $query->execute();
        $categorias = $query->fetchAll(PDO::FETCH_OBJ);
        return $categorias;
    }

    public function MostrarBolsosPorCategoria($id_categoria) {
        $db = $this->ObtenerConexion();
        $query = $db->prepare('
            SELECT bolsos.*, categorias.Categoria
            FROM bolsos
            INNER JOIN categorias ON bolsos.id_categoria = categorias.id_categoria
            WHERE bolsos.id_categoria = ?');
        $query->execute([$id_categoria]);
        $bolsos = $query->fetchAll(PDO::FETCH_OBJ);  
        return $bolsos;
    }
}


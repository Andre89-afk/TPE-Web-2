<?php

class ModeloCategoria{

    private function ObtenerConexion(){
        $db=new PDO('mysql:host=localhost; dbname=comple2;charset=utf8','root','');
        return $db;
    }

    function ObtenerCategorias() {
        $db = $this->ObtenerConexion();
        $query = $db->prepare('SELECT * FROM categorias');
        $query->execute();
        $categorias = $query->fetchAll(PDO::FETCH_OBJ);
        return $categorias;
    }

    function MostrarBolsosPorCategoria($id_categoria) {
        $db = $this->ObtenerConexion();
        $query = $db->prepare('
            SELECT bolsos.*, categorias.Categoria
            FROM bolsos
            INNER JOIN categorias ON bolsos.id_categoria = categorias.id_categoria
            WHERE bolsos.id_categoria = ?
        ');
        $query->execute([$id_categoria]);
        $bolsos = $query->fetchAll(PDO::FETCH_OBJ);  
        return $bolsos;
    }

    function EliminarCategoria($id){
        $db=$this->ObtenerConexion();
        $query= $db->prepare('DELETE FROM categorias  WHERE id_categoria= ?');
        $query->execute([$id]);
    }

    function InsertarCategoria($categoria){
        $db = $this->ObtenerConexion();
        $query = $db->prepare('INSERT INTO categorias (Categoria) VALUES(?)');
        $query->execute([$categoria]);
        return $db->lastInsertId();
    }
    
    function error($msg){
        echo "Error!";
        echo $msg;
    }

    function ObtenerCategoriaPorId($id) {
        $db = $this->ObtenerConexion(); 
        $query = $db->prepare("SELECT * FROM categorias WHERE id_categoria = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ); 
    }
    
    function ActualizarCategoria($categoria, $id) {
        $db = $this->ObtenerConexion();
        $query = $db->prepare("UPDATE categorias SET Categoria = ? WHERE id_categoria = ?");
        $query->execute([$categoria, $id]);
        return $db->lastInsertId(); 
    }
}
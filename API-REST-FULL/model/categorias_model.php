<?php 
 class categoriasModel{
    
    
    private function connect(){
        $db = new PDO('mysql:host=localhost;dbname=chanty_travel;charset=utf8', 'root', '');
        return $db;
    }

    function getCategorias(){
        $db = $this -> connect();
        $query=$db->prepare('SELECT * FROM secciones');
        $query->execute();
        $categorias = $query ->fetchAll(PDO::FETCH_OBJ);//arreglo de categorias

        return $categorias;
    }
    function añadirCategorias($nombre){
        $db = $this -> connect();
        $query=$db->prepare('INSERT INTO secciones(nombre) VALUES (?)');
        $query->execute([$nombre]);

        $id=$db->lastInsertId();

        return $id;
    } 
    function deleteCategorias($id){
        $db = $this -> connect();
        $query=$db->prepare('DELETE FROM secciones WHERE id =?');
        $query->execute([$id]);
        
        var_dump($id);
        return;
    }
    function idCategorias($id){
        $db = $this -> connect();
        $query=$db->prepare('SELECT * FROM secciones WHERE id= ?');
        $query->execute([$id]);
        $categorias = $query ->fetchAll(PDO::FETCH_OBJ);//arreglo de destinos

        return $categorias;
    }

    
    function updateCategorias($id, $nombre){
        $db = $this -> connect();
        $query=$db->prepare('UPDATE secciones SET nombre=? WHERE id=?');
        $query->execute([$nombre,$id]);
        return;
    }
}
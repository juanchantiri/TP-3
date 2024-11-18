<?php 
 class destinosModel{
    
    private $db;

    private function connect(){
        $db = new PDO('mysql:host=localhost;dbname=chanty_travel;charset=utf8', 'root', '');
        return $db;
    }

    function getDestinos(){
        $db = $this -> connect();
        $query=$db->prepare('SELECT * FROM destinos');
        $query->execute();
        $destinos = $query ->fetchAll(PDO::FETCH_OBJ);//arreglo de destinos

        return $destinos;
    }


    function añadirDestinos($pais,$ciudad,$actividades,$precio,$categoria_id){
        $db = $this -> connect();
        $query=$db->prepare('INSERT INTO destinos(pais,ciudad,actividades,precio,categoria_id) VALUES (?,?,?,?,?)');
        $query->execute([$pais,$ciudad,$actividades,$precio,$categoria_id]);

        $id=$db->lastInsertId();

        return $id;

} 

    function deleteDestinos ($id){
        $db = $this -> connect();
        $query=$db->prepare('DELETE FROM destinos WHERE id_destinos =?');
        $query->execute([$id]);
    
        return;
}
    function idDestinos($id){
        $db = $this -> connect();
        $query=$db->prepare('SELECT * FROM destinos WHERE id_destinos= ?');
        $query->execute([$id]);
        $destinos = $query ->fetchAll(PDO::FETCH_OBJ);//arreglo de destinos

        return $destinos;
}

    
    function updateDestinos($id,$pais,$ciudad,$actividades,$precio){
        $db = $this -> connect();
        $query=$db->prepare('UPDATE destinos SET pais=?, ciudad=?, actividades=?, precio=? WHERE id_destinos=?');
        $query->execute([ $pais, $ciudad, $actividades, $precio,$id]);
        return;
    }
    
 }
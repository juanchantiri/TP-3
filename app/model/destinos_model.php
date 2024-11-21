<?php 
 class destinosModel{
    
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=chanty_travel;charset=utf8', 'root', '');
    }

    function getDestinos(){
        $query=$this->db->prepare('SELECT * FROM destinos');
        $query->execute();
        $destinos = $query ->fetchAll(PDO::FETCH_OBJ);//arreglo de destinos

        return $destinos;
    }


    function añadirDestinos($pais,$ciudad,$actividades,$precio,$categoria_id){
        $query=$this->db->prepare('INSERT INTO destinos(pais,ciudad,actividades,precio,categoria_id) VALUES (?,?,?,?,?)');
        $query->execute([$pais,$ciudad,$actividades,$precio,$categoria_id]);

        $id=$this->db->lastInsertId();

        return $id;

} 

    function deleteDestinos ($id){
        $query=$this->db->prepare('DELETE FROM destinos WHERE id_destinos =?');
        $query->execute([$id]);
    
        return;
}
    function idDestinos($id){
        $query=$this->db->prepare('SELECT * FROM destinos WHERE id_destinos= ?');
        $query->execute([$id]);
        $destinos = $query ->fetchAll(PDO::FETCH_OBJ);//arreglo de destinos

        return $destinos;
}

    
    function updateDestinos($id,$pais,$ciudad,$actividades,$precio){
        $query=$this->db->prepare('UPDATE destinos SET pais=?, ciudad=?, actividades=?, precio=? WHERE id_destinos=?');
        $query->execute([ $pais, $ciudad, $actividades, $precio,$id]);
        return;
    }
    
 }
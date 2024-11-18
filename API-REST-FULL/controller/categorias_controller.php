<?php
// require_once 'model/categorias_model.php';
// require_once 'view/view_categorias.php';

// class categoriasController {

// private $categorias_model;
// private $categorias_view; 

// function __construct($res) {
//     $this ->categorias_model = new categoriasModel();
//     $this ->categorias_view = new categoriasView($res);
// }

// function showCategorias(){
//     $categorias =$this->categorias_model->getCategorias();

//     return $this->categorias_view->showCategorias($categorias);
// }

// function mostrarFormCategorias(){
//     $categorias = $this->categorias_model->getCategorias();

//     return $this->categorias_view->mostrarFormCategorias($categorias);
// }

// function addCategorias(){

//     $nombre=$_POST['nombre'];
//     $this->categorias_model->añadirCategorias($nombre);

//     header('Location: ' . BASE_URL . 'listarCategorias');
//     exit();

// }
// function borrarCategorias($id){
//     $this->categorias_model->deleteCategorias($id);

//     header('Location: ' . BASE_URL . 'listarCategorias');
// }
// function actualizarCategorias($id){
//     if ($_SERVER['REQUEST_METHOD']=='GET'){
//         $categorias = $this->categorias_model->idCategorias($id);
//         if(!$categorias){
//             echo 'el destino a editar no existe';
//         }
//         return $this->categorias_view->mostrarUpdateCategorias($categorias);
//     }

//     $nombre=$_POST['nombre'];

//     header('Location: ' . BASE_URL . 'listarCategorias');
//     return $this->categorias_model->updateCategorias($id, $nombre);
    
// }
//}
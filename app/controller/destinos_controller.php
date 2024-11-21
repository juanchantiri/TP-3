<?php
    require_once 'app/model/destinos_model.php';
    require_once 'app/view/json-view.php';  

 class DestinosController {

    private $model;
    private $view; 

    public function __construct() {
        $this->model = new destinosModel();
        $this->view = new JSONView();
    }

    public function getAll($req, $res) {
        $destinos = $this->model->getDestinos();
        if (empty($destinos)) {
            return $this->view->response("No se encontraron destinos", 404);
        }

        return $this->view->response($destinos, 200);
    }

    // API-REST-FUll/destinos/:id
    public function get($req, $res) {
        $id = $req->params->id;
        $destinos = $this->model->getDestinos($id);

        if(!$destinos) {
            return $this->view->response("El destinos con el id=$id no existe", 404);
        }
        return $this->view->response($destinos, 200);
    }

    public function delete($req, $res) {
        $id = $req->params->id;

        $destinos = $this->model->getDestinos($id);

        if (!$destinos) {
            return $this->view->response("El destino con el id=$id no existe", 404);
        }

        $this->model->deleteDestinos ($id);
        $this->view->response("El destino con el id=$id se eliminó con éxito", 200);
    }


    public function create($req, $res) {

        // valido los datos
        if (empty($req->body->pais) || empty($req->body->ciudad)) {
            return $this->view->response('Faltan completar datos', 400);
        }

        // obtengo los datos
        $pais = $req->body->pais;       
        $ciudad = $req->body->ciudad;       
        $actividades = $req->body->actividades;
        $precio = $req->body->precio;      
        $categoria_id = $req->body->categoria_id; 

        // inserto los datos
        $id = $this->model->añadirDestinos($pais,$ciudad,$actividades,$precio,$categoria_id);

        if (!$id) {
            return $this->view->response("Error al insertar destino", 500);
        }

        // buena práctica es devolver el recurso insertado
        $destinos = $this->model->getDestinos($id);
        return $this->view->response($destinos, 201);
    }

    // API-REST-FUll/destinos/:id (PUT)
    public function update($req, $res) {
        $id = $req->params->id;

        // verifico que exista
        $destinos = $this->model->getDestinos($id);
        if (!$destinos) {
            return $this->view->response("El destino con el id=$id no existe", 404);
        }

         // valido los datos
         if (empty($req->body->ciudad) || empty($req->body->pais)) {
            return $this->view->response('Faltan completar datos', 400);
        }

        // obtengo los datos
        $pais = $req->body->pais;       
        $ciudad = $req->body->ciudad;       
        $actividades = $req->body->actividades;
        $precio = $req->body->precio;  

        // actualizo el destino
        $this->model->updateDestinos($id,$pais,$ciudad,$actividades,$precio);

        $destinos = $this->model->getDestinos($id);
        $this->view->response($destinos, 200);
    }

}

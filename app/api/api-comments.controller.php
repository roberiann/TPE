<?php
require_once 'app/models/comment.model.php';
require_once 'app/api/api.view.php';

class ApiCommentController {

    private $model;
    private $view;

    function __construct() {
        $this->model = new CommentModel();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
    }

    function getData(){ 
        return json_decode($this->data); 
    } 

    // public function getAll($params = null) {
    //     $parametros = [];

    //     if (isset($_GET['sort'])) {
    //         $parametros['sort'] = $_GET['sort'];
    //     }

    //     if (isset($_GET['order'])) {
    //         $parametros['order'] = $_GET['order'];
    //     }

    //     $tasks = $this->model->getAll($parametros);
    //     $this->view->response($tasks, 200);
    // }

    public function getAll($params = null) {
        $idProduct = $params[':ID'];
        $comments = $this->model->get($idProduct);
        if ($comments)
            $this->view->response($comments, 200);
        else
            $this->view->response("El producto con el id=$idProduct no existe o no registra comentarios", 404);
    }

    public function delete($params = null) {
        $idComment = $params[':ID'];
        $success = $this->model->remove($idComment);
        if ($success) {
            $this->view->response("El comentario con el id=$idComment se borró exitosamente", 200);
        }
        else { 
            $this->view->response("La comentario con el id=$idComment no existe", 404);
        }
    }

    public function add($params = null) {

        $body = $this->getData();

        $descripcion  = $body->descripcion;
        $calificacion = $body->calificacion;
        $id_Producto    = $body->id_producto;

        $id = $this->model->insert($descripcion, $calificacion, $id_Producto);

        if ($id > 0) {
            $this->view->response("Se agrego el comentario $id exitosamente", 200);
        }
        else { 
            $this->view->response("No se pudo insertar", 500);
        }
     }

    // public function update($params = null) {
    //     $idTask = $params[':ID'];
    //     $body = $this->getData();

    //     $titulo       = $body->titulo;
    //     $descripcion  = $body->descripcion;
    //     $prioridad    = $body->prioridad;

    //     $success = $this->model->update($titulo, $descripcion, $prioridad, $idTask);

    //     if ($success) {
    //         $this->view->response("Se actualizó la tarea $idTask exitosamente", 200);
    //     }
    //     else { 
    //         $this->view->response("No se pudo actualizar", 500);
    //     }
    // }


    public function show404($params = null) {
        $this->view->response("El recurso solicitado no existe", 404);
    }

}
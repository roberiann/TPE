<?php
require_once 'app/models/comment.model.php';
require_once 'app/models/product.model.php';
require_once 'app/api/api.view.php';

class ApiCommentController
{

    private $modelProduct;
    private $model;
    private $view;

    function __construct()
    {
        $this->model = new CommentModel();
        $this->modelProduct = new ProductModel();
        $this->view = new APIView();
        $this->data = file_get_contents("php://input");
    }

    function getData()
    {
        return json_decode($this->data);
    }

    public function getAll($params = null)
    {
        $idProduct = $params[':ID'];
        $check = $this->modelProduct->existProduct($idProduct);
        if ($check) {
            $comments = $this->model->getAll($idProduct);
            $this->view->response($comments, 200);
        } else {
            $this->view->response("El producto con el id=$idProduct no existe", 404);
        }
    }

    public function delete($params = null)
    {
        $idComment = $params[':ID'];
        $success = $this->model->remove($idComment);
        if ($success) {
            $this->view->response("El comentario con el id=$idComment se borró exitosamente", 200);
        } else {
            $this->view->response("La comentario con el id=$idComment no existe", 404);
        }
    }

    public function insert($params = null)
    {
        $body = $this->getData();

        $descripcion  = $body->descripcion;
        $calificacion = $body->calificacion;
        $id_Producto  = $body->id_producto;
        $id_usuario   = $body->id_usuario;

        $id = $this->model->insert($descripcion, $calificacion, $id_Producto, $id_usuario);

        if ($id > 0) {
            $msj = $this->model->get($id);
            $this->view->response($msj, 200);
        } else {
            $this->view->response("No se pudo insertar", 500);
        }
    }

    public function show404($params = null)
    {
        $this->view->response("El recurso solicitado no existe", 404);
    }
}

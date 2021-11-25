<?php
require_once('./models/CommentModel.php');
require_once('./api/APIView.php');

require_once "./models/album.model.php";

// Controlador para la API de los comentarios
class ApiController{
    protected $commentModel;
    protected $albumtModel;
    protected $view;
    private $data; 

    public function __construct() {
        $this->view = new APIView();
        $this->data = file_get_contents("php://input"); 
        $this->commentModel = new CommentModel();
        $this->albumModel = new AlbumModel();
    }

    function getData(){ 
        return json_decode($this->data); 
    } 
//esta funcion borrar fue para probar la api jeje
    function getAlbums(){
          $albums = $this->albumModel->getAlbums();
                return $this->view->response($albums,200);
    }

    /************************            Comentarios         *************************************/

    // Trae los comentarios de la BD de un album determinado
    function getComments(){
        $comment = $this->commentModel->getComentarios();
        return $this->view->response($comment,200);
    }
    function getCommentsById($params=null){
        
        $comment = $this->commentModel->getComment($params[':ID']);
        return $this->view->response($comment,200);

    }
    
    /*public function getComments($params = []) {

        if(!empty($params)) {
            $album_id = $params[':ID'];
            $comments = $this->commentModel->getAlbumComments($album_id);

            if ($comments) {
                $this->view->response($comments, 200);
            } else {
                $this->view->response(null, 200);
            }
        }

    }*/
    private function getBody(){
        $comentString = file_get_contents("php://input");
        return json_decode($comentString);

    }
    // Guarda un comentario en la BD
    function insertComment($params = null) {
        // obtengo el body del request (json)
        $body = $this->getBody();
        var_dump($body);
        // TODO: VALIDACIONES -> 400 (Bad Request)
    
        $id = $this->commentModel->postComment($body->album,$body->user,$body->comment,$body->rating);
        var_dump($id);
        
        
        if ($id != 0) {
            $this->view->response("Comment was inserted with id:=$id", 201);
        } else {
            $this->view->response("Comment could not be inserted", 500);
        }
    }

    


    // Borra un comentario de la BD
    public function deleteComment($params=null) {

        if (!empty($params)) {
            $id = $params[':ID'];
            $id_coment=$params[':idcomment'];
            $success = $this->commentModel->getCommentsById($id);
            if (!empty($success)) {
                $this->commentModel->deleteComment($id_coment);
                $this->view->response("The comment was deleted successfully", 200);
            }
            else {
                $this->view->response('The comment cannot be deleted because it does not exist.', 200);
            }
        }
        else {
            $this->view->response("The comment cannot be deleted ", 404);
        }

    }

}

?>
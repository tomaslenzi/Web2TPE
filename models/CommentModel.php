<?php

class CommentModel{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=tpeprueba;charset=utf8', 'root', '');
    }

    function getComentarios(){
        $sentencia = $this->db->prepare( "select * from comment join user on comment.user_id = user.user_id");
        $sentencia->execute();
        $comentarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $comentarios;
    }

    public function getAlbumComments($id) {
        $query = $this->db->prepare ('SELECT *FROM Comment WHERE album_id=?');
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
   
    function postComment($album_id,$user_id,$content,$rating){
        $sentencia = $this->db->prepare("INSERT INTO comment ( album_id,user_id, content, rating) VALUES (?, ?, ?, ?)");
        $sentencia->execute(array($album_id,$user_id,$content,$rating));
        return $this->db->lastInsertId();
    }
    public function getComment($id) {
        $query = $this->db->prepare("SELECT comment.comment_id,comment.rating,comment.content,comment.album_id, user.email, user.admin FROM comment JOIN user ON comment.user_id = user.user_id WHERE album_id=?");
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function deleteComment($id) {
        $sentencia = $this->db->prepare("DELETE FROM comment WHERE comment_id= ?");
        $sentencia->execute(array($id));
    }
    function getCommentsById($id){
        $sentencia = $this->db->prepare( "SELECT comment.comment_id,comment.rating,comment.content,comment.album_id, user.email, user.admin FROM comment JOIN user ON comment.user_id = user.user_id WHERE album_id=?;");
        $sentencia->execute(array($id));
        $tareas = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $tareas;
    }







}
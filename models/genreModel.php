<?php

class GenreModel
{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=tpeprueba;charset=utf8', 'root', '');
    }

    public function getGenres(){
        $query = $this->db->prepare('SELECT * FROM MusicGenre');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAlbumsByGenres($idGenre){
        $query = $this->db->prepare('SELECT *FROM Album WHERE genre_id=?');

        $query->execute(array($idGenre));
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function save($genre, $description){
        $query = $this->db->prepare('INSERT INTO MusicGenre(genre, description) VALUES(?,?)');
        $query->execute(array($genre, $description));
    }

    function edit($idGenre, $genre, $description){
        $query = $this->db->prepare('UPDATE  MusicGenre SET `genre`=?, `description`=? WHERE `genre_id` =?');

        $query->execute(array($genre, $description, $idGenre));
    }


    function delete($idGenre){
        $query = $this->db->prepare('DELETE FROM MusicGenre WHERE genre_id = ?');
        $query->execute([$idGenre]);
    }
}

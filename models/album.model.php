<?php

class AlbumModel{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=tpeprueba;charset=utf8', 'root', '');
    }

    public function getAlbums(){
        $query = $this->db->prepare('SELECT a.album_id,a.artist,a.name,a.year,a.sales,a.cover,a.genre_id, b.genre FROM Album a LEFT JOIN MusicGenre b ON a.genre_id = b.genre_id
        ');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAlbumsByFilterGenre($genre){
        $query = $this->db->prepare('SELECT * FROM Album WHERE genre_id=?');
        $query->execute([($genre)]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

public function getAlbum($idAlbum){
    $query = $this->db->prepare('SELECT * FROM Album WHERE album_id = ?');
    $query->execute(array($idAlbum));

    return $query->fetch(PDO::FETCH_OBJ);

}

    public function getAlbumsOrderG(){
        $query = $this->db->prepare('SELECT a.album_id,a.artist,a.name,a.year,a.sales,a.cover, b.genre FROM Album a LEFT JOIN MusicGenre b ON a.genre_id = b.genre_id
         ORDER BY genre');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getAlbumsOrderSales(){
        $query = $this->db->prepare('SELECT a.album_id,a.artist,a.name,a.year,a.sales,a.cover, b.genre FROM Album a LEFT JOIN MusicGenre b ON a.genre_id = b.genre_id
        ORDER BY sales DESC');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getAlbumsOrderArtist(){
        $query = $this->db->prepare('SELECT album_id, artist, name, cover FROM Album');
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    //RETORNA INFO DEL GENERO JEJE

    function getAlbumDetail($idAlbum){
        //$db = connect();
        $query = $this->db->prepare('SELECT * FROM MusicGenre WHERE genre = ?');
        $query->execute(array($idAlbum));

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function save($artist, $name, $sales, $year, $cover, $genre){
        $query = $this->db->prepare('INSERT INTO Album(artist, name, sales, year, cover, genre_id) VALUES(?,?,?,?,?,?)');
        $query->execute(array($artist, $name, $sales, $year, $cover, $genre));
    }

    function delete($idAlbum){
        $query = $this->db->prepare('DELETE FROM Album WHERE album_id = ?');
        $query->execute([$idAlbum]);
    }
    function edit($idAlbum, $artist, $name, $sales, $year, $cover, $genre){
        $query = $this->db->prepare('UPDATE  Album SET `artist`=?, `name`=?, `sales`=?, `year`=?, `cover`=?, `genre_id`=? WHERE `album_id` =?');

        $query->execute(array($artist, $name, $sales, $year, $cover, $genre, $idAlbum));
    }
}

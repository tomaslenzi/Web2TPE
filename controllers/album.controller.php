<?php
include_once('models/album.model.php');
include_once('views/album.view.php');
include_once('helpers/authHelper.php');
include_once('models/genreModel.php');

class AlbumController{
    private $model;
    private $view;
    private $authHelper;
    private $model_genre;

    public function __construct(){
        $this->model = new AlbumModel;
        $this->authHelper = new AuthHelper();
        $this->view = new AlbumView($this->authHelper->getID(),$this->authHelper->getRol());
        $this->model_genre = new GenreModel;
    }

    //muestra la tabla de albums
    public function showAlbums(){

        $albums = $this->model->getAlbums();
        $genre = $this->model_genre->getGenres();
        //se la paso  a la vista jeje
        $this->view->showAlbums($albums, $genre);
    }

    public function showAlbumsByFilter(){
        // obtengo albums del model
        $genero = $_POST['filterGenero'];

        $albums = $this->model->getAlbumsByFilterGenre($genero);


        //se la paso  a la vista jeje
        $this->view->showAlbumsByFilter($albums, $genero);
    }

    public function valoraciones($idAlbum){
        $album = $this->model->getAlbum($idAlbum);
        $user_id=$this->authHelper->getId();
        $rol=$this->authHelper->getRol();
        $this->view->showValoracionCSR($album,$user_id,$rol);

    }

    public function showAlbum($idAlbum){
        $album = $this->model->getAlbumDetail($idAlbum);

        if ($album) //si existe el album
            $this->view->showAlbum($album);
        else
            $this->view->showError('El album no existe');
    }

    public function showAlbumsOrderByArtist(){
        // obtengo albums del model

        $albums = $this->model->getAlbumsOrderArtist();

        //se la paso  a la vista jeje
        $this->view->showAlbumsOrderByArtist($albums);
    }

    ///agregar un nuevo album

    public function addAlbum(){
        $this->authHelper->esAdmin();
        $artist = $_POST['artist'];
        $name = $_POST['name'];
        $sales = $_POST['sales'];
        $year = $_POST['year'];
        $cover = $_POST['cover'];
        $genre = $_POST['genre_id'];

        if (!empty($artist)) {
            $this->model->save($artist, $name, $sales, $year, $cover, $genre);
            header("Location: ./ver");
        } else {
            $this->view->showError("Faltan datos obligatorios");
        }
        }
        

    

    //eliminar album de la base de datos y la pagina
    public function deleteAlbum($idAlbum){

        $this->authHelper->esAdmin();
        $this->model->delete($idAlbum);

        header("Location: ../ver");
    }

    //editar un album

    public function editAlbum(){

        $this->authHelper->esAdmin();

        $idAlbum = $_POST['album_id'];
        $artist = $_POST['artist'];
        $name = $_POST['name'];
        $sales = $_POST['sales'];
        $year = $_POST['year'];
        $cover = $_POST['cover'];
        $genre = $_POST['genre_id'];

        if (!empty($artist)) {
            $this->model->edit($idAlbum, $artist, $name, $sales, $year, $cover, $genre);
            header("Location: ./ver");
        } else {
            $this->view->showError("Faltan datos obligatorios");
        }
    }
}

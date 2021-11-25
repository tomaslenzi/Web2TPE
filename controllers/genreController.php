<?php
include_once('models/genreModel.php');
include_once('views/genreView.php');
include_once('helpers/authHelper.php');



class GenreController{
    private $model;
    private $view;
    private $authHelper;

    public function __construct(){
        $this->model = new GenreModel;
        $this->authHelper = new AuthHelper();
        $this->view = new GenreView($this->authHelper->getID(),$this->authHelper->getRol());

    }
    //muestra la tabla de generos
    public function showGenres(){
        // obtengo generos del model

        $albums = $this->model->getGenres();
        $user_id=$this->authHelper->getId();
        $rol=$this->authHelper->getRol();
        //se la paso  a la vista jeje
        $this->view->showGenres($albums,$rol,$user_id,);
    }
    public function showAlbumsByGenre($idGenre){
        // obtengo albums pertenecientes a un genero pasado por parametro

        $albums = $this->model->getAlbumsByGenres($idGenre);

        //se la paso  a la vista jeje
        $this->view->showAlbumsByGenre($albums);
    }    

    public function addGenre(){

        $this->authHelper->esAdmin();

        $genre = $_POST['genre'];
        $description = $_POST['description'];


        if (!empty($genre)) {
            $this->model->save($genre, $description);
            header("Location: ./genre");
        } else {
            $this->view->showError("Faltan datos obligatorios");
        }
    }

    public function editGenre(){

        $this->authHelper->esAdmin();

        $idGenre = $_POST['genre_id'];
        $genre = $_POST['genre'];
        $description = $_POST['description'];

        if (!empty($genre)) {
            $this->model->edit($idGenre, $genre, $description);
            header("Location: ./genre");
        } else {
            $this->view->showError("Faltan datos obligatorios");
        }
    }

    public function deleteGenre($idGenre){
        $this->authHelper->esAdmin();
        try{
        $this->model->delete($idGenre);
        header("Location: ../genre");   }
        catch(PDOException $e){
                        
            header("Location: ../genre");
                        exit;
                }
         
              }
    
    }



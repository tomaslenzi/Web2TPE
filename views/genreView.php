<?php
require_once('libs/Smarty.class.php');
include_once('helpers/authHelper.php');

class GenreView{


    private $smarty;
    
    public function __construct($user_id=null, $rol=null){
        $this->smarty = new Smarty();
        $this->smarty->assign('user_id',$user_id);
        $this->smarty->assign('rol',$rol);
       
    }

    public function showGenres($genres, $rol=null,$user_id=null){
        $smarty = new Smarty();
        $smarty->assign('titulo', 'Lista de Generos');
        $smarty->assign('user_id', $user_id);
        $smarty->assign('rol',$rol);
        $smarty->assign('genres', $genres);
       
        $smarty->display('templates/genreList.tpl');
    }

    public function showAlbumsByGenre($genre,$rol=null){
        $smarty = new Smarty();
        $smarty->assign('titulo', 'Lista de Generos');
        $smarty->assign('rol',$rol);
        $smarty->assign('genre', $genre);
        $smarty->display('templates/albumsByGenre.tpl');
    }

    public function showError($msgError){
        echo "<h1>ERROR!</h1>";
        echo "<h2>{$msgError}</h2>";
    }
}

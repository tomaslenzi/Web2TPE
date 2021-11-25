<?php
require_once('libs/Smarty.class.php');
include_once('helpers/authHelper.php');

class AlbumView{


    private $smarty;

    public function __construct($user_id=null, $rol=null){
        $this->smarty = new Smarty();
        $this->smarty->assign('user_id',$user_id);
        $this->smarty->assign('rol',$rol);
       
    }
    public function header(){
        $this->smarty->display('templates/header.tpl');
    }

    public function showAlbums($albums, $genre){
        
        $this->smarty->assign('titulo', 'Lista de Albums');
        $this->smarty->assign('albums', $albums);
        $this->smarty->assign('genre', $genre);
        $this->smarty->display('templates/albumList.tpl');
    }

    public function showAlbumsOrderByArtist($albums){
        
        $this->smarty->assign('titulo', 'Lista de Albums');
        $this->smarty->assign('albums', $albums);
        $this->smarty->display('templates/artistList.tpl');
    }

    public function showError($msgError){
        echo "<h1>ERROR!</h1>";
        echo "<h2>{$msgError}</h2>";
    }

    public function showAlbumsByFilter($albums, $genero, $rol=null){
        $smarty = new Smarty();
        $smarty->assign('titulo', 'Lista de Albums');
        $smarty->assign('albums', $albums);
        $smarty->assign('rol',$rol);
        $smarty->assign('genre', $genero);
        $smarty->display('templates/albumListByGenre.tpl');
    }


    public function showAlbum($album){
        $genero = $album;
        $smarty = new Smarty();
        $smarty->assign('titulo', 'Detalle del Album');
        $smarty->assign('album', $album);
        $smarty->assign('genero', $genero);
        $smarty->display('templates/albumDetail.tpl');
    }

    public function showValoracionCSR($album,$user_id=null,$rol=null){
        $smarty = new Smarty();
        $smarty->assign('titulo', 'valoraciones');
        $smarty->assign('album', $album);
        $smarty->assign('user_id', $user_id);
        $smarty->assign('rol', $rol);
        $smarty->display('templates/valoracionAlbum.tpl');

    }
}

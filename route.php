<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('controllers/album.controller.php');
require_once('controllers/genreController.php');
require_once('controllers/userController.php');

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
define("LOGIN", BASE_URL . 'login');
define("VER", BASE_URL . 'ver');




// si no viene una "action", definimos una por defecto
if ($_GET['action'] == '')
    $_GET['action'] = 'home';



$partesURL = explode('/', $_GET['action']);

switch ($partesURL[0]) {
    case 'login':
        $controller = new UserController();
        $controller->showLogin();
        break;
    case 'signUp':
        $controller = new UserController();
        $controller->Register();
        break;
    case 'adminMenu':
        $controller = new UserController();
        $controller->showAdminMenu();
        break;
    case 'eliminarUsuario':
        $controller = new UserController();
        $controller->deleteUser($partesURL[1]);
        break;
    case 'darAdmin':
        $controller = new UserController();
        $controller->darRolAdmin($partesURL[1]);
        break;
    case 'quitarAdmin':
        $controller = new UserController();
        $controller->quitarRolAdmin($partesURL[1]);
        break;
    case 'logout':
        $controller = new UserController();
        $controller->logout();
        break;
       
    case 'valoraciones-csr':
        $controller = new AlbumController();
        $controller->valoraciones($partesURL[1]);
        break;
    case 'register':
        $usercontroller = new UserController();
        $usercontroller->register_account();
        break;
    case 'album':
        $controller = new AlbumController();
        $controller->showAlbum($partesURL[1]);
        break;
    case 'ver':
        $controller = new AlbumController();
        $controller->showAlbums();
        break;
    case 'viewByGenre':
        $controller = new AlbumController();
        $controller->showAlbumsByFilter();
        break;
    case 'home':
        $controller = new AlbumController();
        $controller->showAlbumsOrderByArtist();
        break;
    case 'nueva':
        $controller = new AlbumController();
        $controller->addAlbum();
        break;
    case 'eliminar':
        $controller = new AlbumController();
        $controller->deleteAlbum($partesURL[1]);
        break;
    case 'editar':
        $controller = new AlbumController();
        $controller->editAlbum();
        break;

    case 'genre':
        $controller = new GenreController();
        $controller->showGenres();
        break;
    case 'albums':
        $controller = new GenreController();
        $controller->showAlbumsByGenre($partesURL[1]);
        break;

    case 'nuevoGenre':
        $controller = new GenreController();
        $controller->addGenre();
        break;
    case 'verify':
        $controller = new UserController();
        $controller->verifyUser();
        break;
    case 'editarGenre':
        $controller = new GenreController();
        $controller->editGenre();
        break;
    case 'eliminarGenre':
        $controller = new GenreController();
        $controller->deleteGenre($partesURL[1]);
        break;


    default:
        echo "<h1>Error 404 - Page not found </h1>";
        break;
}


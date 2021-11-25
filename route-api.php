<?php

require_once('libs/Router.php');
require_once('api/APIController.php');

// Crear un objeto basado en la clase Router
$router = new Router();

// Definir la tabla de ruteo
$router->addRoute('comment/:ID','GET','APIController','getComments');

$router->addRoute('album/:ID/comment/:idcomment','DELETE','APIController','deleteComment');

//borrar o ver
$router->addRoute('comments','GET','APIController','getAlbums');
$router->addRoute('album/:ID/comment','GET','ApiController','getCommentsById');
$router->addRoute('comment','GET','ApiController','getComments');
$router->addRoute('album/:ID/comment','POST','ApiController','insertComment');

$router->route($_REQUEST['resource'], $_SERVER['REQUEST_METHOD']);
<?php
     session_start();
class AuthHelper
{
    public function __construct(){
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
    public function checkLoggedIn(){
        
        if (!isset($_SESSION['email'])) {

            header('Location: ' . LOGIN);
            die();
        }
    }

    function esAdmin(){
        if($this->checkLoggedIn()){
            return $_SESSION["admin"]->Rol==1;
        }
    }
    function getID(){
        if (isset($_SESSION['user_id'])) {
            return $_SESSION['user_id'] ;
        }
    } 
    function getRol(){
        if (isset($_SESSION['admin'])) {
            return $_SESSION['admin'] ;
        }

    }

    function idUsuarioAcual(){
        if($this->checkLoggedIn()){
            return $_SESSION["usuario"]->id_usuario;
        }else{
            return 0;
        }
    }


    public function logout(){
        session_start();
        session_destroy();
    }
   

    

}

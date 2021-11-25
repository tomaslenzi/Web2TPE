<?php
require_once('libs/Smarty.class.php');
include_once('helpers/authHelper.php');

class UserView{
    private $smarty;

    public function __construct($user_id=null, $rol=null){
        $this->smarty = new Smarty();
        $this->smarty->assign('user_id',$user_id);
        $this->smarty->assign('rol',$rol);
       
    }

    public function header(){
        $this->smarty->display('templates/header.tpl');
    }


    public function showLogin($error = null){
        $this->smarty->assign('titulo', 'Iniciar Sesión');
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/login.tpl');
    }
    public function showSignUp($mensaje = null){
        $this->smarty->assign('titulo', 'Sign Up');
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->display('templates/signUp.tpl');
    }

    public function showError($msgError){
        echo "<h1>ERROR!</h1>";
        echo "<h2>{$msgError}</h2>";
    }
    public function showUsers($users, $rol=null){
        $smarty = new Smarty();
        $smarty->assign('titulo', 'Detalle del Album');
        $smarty->assign('users', $users);
        $smarty->assign('rol',$rol);
        $smarty->display('templates/adminMenu.tpl');
    }
}

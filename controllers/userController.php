<?php
include_once('./views/userView.php');
include_once('./models/userModel.php');
include_once('./helpers/authHelper.php');



class UserController{

    private $view;
    private $model;
    private $authHelper;

    public function __construct(){
        $this->authHelper = new AuthHelper();
        $this->view = new UserView($this->authHelper->getID(),$this->authHelper->getRol());
        $this->model = new UserModel();
    }
    public function showAdminMenu(){
       $users= $this->model->getUsers();
       $this->view->showUsers($users);
    }




    public function deleteUser($user_Id){

        
        $this->model->borrarUsuario($user_Id);
        header("Location: ../adminMenu");

    }
    public function darRolAdmin($user_Id){
        
        $this->model->darRolAdmin($user_Id);
        header("Location: ../adminMenu");
    }
    public function quitarRolAdmin($user_Id){
       
        $this->model->quitarRolAdmin($user_Id);
        header("Location: ../adminMenu");
    }
  

    public function showLogin(){
        $this->view->showLogin();
    }
    public function verifyUser(){
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->model->getByUsername($username);

            // encontró un user con el username que mandó, y tiene la misma contraseña
            if($user && password_verify($password, $user->password)) {
                session_start();
                $_SESSION['user_id']=$user->user_id;
                $_SESSION['email']=$user->email;
                $_SESSION['admin']=$user->admin;
                
              

                //$this->authHelper->login($username);
               
                header('Location: ' . BASE_URL . 'home');
            } else {
                $this->view->showLogin("Incorrect username or password.");
            }
        }
    }
    public function logout(){
        $this->authHelper->logout();
        header('Location: ' . BASE_URL . 'home');


    }
    public function Register(){
        $this->view->showSignUp();
    }
    function register_account(){
        if(!empty($_POST['email_registrar'])&& !empty($_POST['password_registrar'])){
            $userEmail=$_POST['email_registrar'];
            $userPassword=$_POST['password_registrar'];
            $email_disponible= $this->model->check_existent_user($userEmail); 
            if (empty($email_disponible)){
                $clave_encriptada = password_hash ($userPassword , PASSWORD_DEFAULT );
                $this->model->register_user($userEmail,$clave_encriptada);
                $this->view->showSignUp('<h4 class="alert alert-success">"Cuenta creada!"</h4>');
                header('Location: ' . BASE_URL . 'ver');
                
            }else{
                $this->view->showSignUp('<h4 class="alert alert-danger">"Email ya en uso,Intente con otro"</h4>');
              
            } 
           
          
        }
    
     

    }
}

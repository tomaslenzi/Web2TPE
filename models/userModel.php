<?php

class UserModel{

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=tpeprueba;charset=utf8', 'root', '');
    }

    public function getByUsername($username){
        $query = $this->db->prepare('SELECT * FROM User WHERE email = ?');
        $query->execute(array($username));

        return $query->fetch(PDO::FETCH_OBJ);
    }

    function register_user($userEmail, $userPassword){

        $query = $this->db->prepare('INSERT INTO User (email, password) VALUES (? , ?)');
        $query->execute([$userEmail, $userPassword]);
    }
    function check_existent_user($email_checker){
        $query = $this->db->prepare('SELECT email FROM User WHERE email=?');
        $query->execute([$email_checker]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
    function getUsers(){
        $query = $this->db->prepare('SELECT * FROM User ');
        $query->execute();

        return $query->fetchall(PDO::FETCH_OBJ);
    }
    function borrarUsuario($userId){
        $query = $this->db->prepare('DELETE FROM User WHERE user_id = ?');
        $query->execute([$userId]);

    }
    function darRolAdmin($userId){
        $query = $this->db->prepare('UPDATE  User SET `admin`=1 WHERE user_id = ?');
        $query->execute([$userId]);
    }
    function quitarRolAdmin($userId){
        $query = $this->db->prepare('UPDATE  User SET `admin`=0 WHERE user_id = ?');
        $query->execute([$userId]);
    }
}

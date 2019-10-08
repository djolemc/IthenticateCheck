<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of korisnik
 *
 * @author drago
 */
class User {
  
    private $db;
    
    public function __construct() {
      //  $this->db = new Database();
    }
    
    public function login ($username, $password) {
        
        $this->db->query("SELECT * FROM users WHERE username=:username AND password =:password");
        $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);
        
        $row= $this->db->single();
        
        if ($this->db->rowCount() > 0) {
            $this->setUserData($row);
            return true;
        } else {
            return FALSE;
        }
    }

    public function localLogin($username, $password){
//        $_SESSION['is_logged_in'] = true;
//        header("Location: index.php");
//        die();
        $user =ucfirst(strtolower($username));

       // $password=$_POST['password'];

        if ((in_array($user, USERNAMES)) && (md5($password) == PASSWORD)) {
            $_SESSION['is_logged_in'] = true;
            $_SESSION['user_id'] = 1;
            $_SESSION['username'] = $user;
            $_SESSION['name'] = $user;
                    }

    }




    public function logout() {
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['name']);
    }
    
    public function setUserData($row) {
        $_SESSION['is_logged_in'] = true;
        $_SESSION['user_id'] = $row->id;
        $_SESSION['username'] = $row->username;
        $_SESSION['name'] = $row->name;
        
    }
    
    
    
    
}

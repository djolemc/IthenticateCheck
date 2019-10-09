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

    //Ne koristi se za sad
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
        $user =ucfirst(strtolower($username));

        if ((in_array($user, USERNAMES)) && (md5($password) == PASSWORD)) {
            $_SESSION['is_logged_in'] = true;
            $_SESSION['user_id'] = 1;
            $_SESSION['username'] = $user;
            $_SESSION['name'] = $user;
                    } else {
            $_SESSION['msg'] = "Pogrešno korisničko ime ili lozinka!";
        }
    }


    public function logout() {
        unset($_POST['logout']);
        unset($_SESSION['is_logged_in']);
        session_destroy();
        $host  = $_SERVER['HTTP_HOST'];
        $link = "http://$host/plagijarizam2/controllers/login.php";
        return $link;
//        die();
    }


    //Ne koristi se za sad
    private function setUserData($row) {
        $_SESSION['is_logged_in'] = true;
        $_SESSION['user_id'] = $row->id;
        $_SESSION['username'] = $row->username;
        $_SESSION['name'] = $row->name;
        
    }
    
    
    
    
}

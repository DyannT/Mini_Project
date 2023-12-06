<?php

trait UserTrait{
    public function getUsernameLogin(){
        return $_SESSION['user'];
    }

    public function setUsernameLogin($username){
        $_SESSION['user'] = $username;
    }
}
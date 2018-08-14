<?php


class ConnectionService
{
    public function isConnected(){
        return $_COOKIE['projet4'];
    }

    public function logout(){
        setcookie('projet4', 'projet4', time() - 1);
    }

}

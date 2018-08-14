<?php

require_once('BaseDao.php');
require('model/User.php');

class UserDao extends BaseDao
{
    public function create()
    {
        $pseudo = 'root';
        $password = password_hash('root', PASSWORD_DEFAULT);
        $query = $this->db->prepare('INSERT INTO `user`(pseudo, password) VALUES(?, ?)');
        $query->bind_param('ss', $pseudo, $password);
        $query->execute();
    }

    public function findByPseudo($pseudo)
    {
        $userDb = $this->db->query("SELECT * FROM `user` WHERE pseudo ='" . $pseudo . "'")->fetch_assoc();
        return new User($userDb['id'], $userDb['pseudo'], $userDb['password']);
    }

}

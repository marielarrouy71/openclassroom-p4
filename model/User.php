<?php

class User
{
    private $id;
    private $pseudo;
    private $password;

    /**
     * Comment constructor.
     * @param $id
     * @param $pseudo
     * @param $password
     */
    public function __construct($id, $pseudo, $password)
    {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }




}

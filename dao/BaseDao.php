<?php
class BaseDao{

    protected $db;

    public function __construct(){

        $this->db=mysqli_connect('localhost','root','','projet4');
    }
}

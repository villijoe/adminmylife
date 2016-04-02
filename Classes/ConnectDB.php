<?php

/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 02.04.2016
 * Time: 11:47
 */
class ConnectDB
{
    private $host = 'localhost';
    private $dbname = 'adminmylife';
    private $login = 'root';
    private $password = '';
    private $conn;


    public function __construct() {
        $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->login, $this->password) or die("no db connect");
    }

    public function getConnection() {
        return $this->conn;
    }
}
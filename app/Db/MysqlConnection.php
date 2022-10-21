<?php

namespace App\Db;

use mysqli;

class MysqlConnection
{
    private $host;
    private $username;
    private $password;
    private $db;
    private $port;

    private $conn;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->port = '3306';
        $this->db = 'zel_test';
    }

    private function makeConnection()
    {
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->db, $this->port);

        if ($this->conn->connect_error) {
            die('Connection failed' . $this->conn->connect_error);
        }
    }

    public function getConnection()
    {
        $this->makeConnection();
        return $this->conn;
    }
}
<?php

namespace App\Repository;

use App\Db\MysqlConnection;

class ContactRepository
{
    private $connection;

    public function __construct()
    {
        $this->connection = (new MysqlConnection())->getConnection();
    }

    public function getByName($name)
    {
        $name = stripslashes($name);
        $query = "SELECT name, phone FROM contacts WHERE name = '" . $name . "';";
        $result = mysqli_query($this->connection, $query);

        if ($result->num_rows <= 0) return null;

        $result = mysqli_fetch_assoc($result);

        return $result;
    }
}
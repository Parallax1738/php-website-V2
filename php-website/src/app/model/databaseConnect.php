<?php

namespace bikeshop\app\model;
use mysqli;


class DatabaseConnect
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    protected mysqli $connection;

    public function __construct($servername = "bike-shop-database", $username = "user", $password = "password", $dbname = "BIKE_SHOP")
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function connect()
    {
        $this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        if ($this->connection->connect_error) {
            echo "Connection failed: " . $this->connection->connect_error;
        }

        return $this->connection;
    }

    public function __destruct()
    {
            $this->connection->close();
    }
}

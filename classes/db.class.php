<?php

class db {

    public $connection;

    function __construct(){

        $server = "localhost\SQLEXPRESS";
        // $server = "localhost";
        // $dbName = "pas_uat";
        $dbName = "pas_dev";
        $userName = "pasuser";
        $password = "";

        // $this->connection = new PDO("sqlsrv:Server=localhost;Database=pas_uat", $userName, $password);
        $this->connection = new PDO("sqlsrv:Server=DESKTOP-2K1UP0H\SQLEXPRESS;Database=pas_dev", $userName, $password);
    }

    public function getConnection() {
        return $this->connection;
    }
}
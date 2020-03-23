<?php

class db {

    public $connection;

    function __construct(){

        $server = "localhost";
        $dbName = "pas_uat";
        $userName = "pasuser";
        $password = "";

        $this->connection = new PDO("sqlsrv:Server=localhost;Database=pas_uat", $userName, $password);
    }

    public function getConnection() {
        return $this->connection;
    }


}
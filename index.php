<?php

spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.class.php';
});

$db = new db();

$connection = $db->getConnection();

$sqlStr = "select * from customers";

$stm = $connection->query("select * from customer")->fetchAll(PDO::FETCH_ASSOC);

header('Content-type: application/json');

echo json_encode($stm);
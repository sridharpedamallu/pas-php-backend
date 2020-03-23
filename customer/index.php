<?php

header('Access-Control-Allow-Origin: *');

spl_autoload_register(function ($class) {
    include '../classes/' . $class . '.class.php';
});

class customer {


    public function list($page = 1, $rows = 10) {

        $db = new db();

        $connection = $db->getConnection();

        $offsetFrom = ($page - 1) * $rows;
        
        $sqlStr = "SELECT * from Customer ORDER BY customer.CustomerId
                        OFFSET " . $offsetFrom . " ROWS
                        FETCH NEXT " . $rows . " ROWS ONLY OPTION (RECOMPILE);";
        
        $stm = $connection->
                query($sqlStr)->
                fetchAll(PDO::FETCH_ASSOC);
        
        $currentPageRows = count($stm);

        $data = array(
            'currentPageRows' => $currentPageRows, 
            'data' => $stm);
                
        header('Content-type: application/json');

        return json_encode($data);
    }

}

$c = new customer();

if (isset($_GET['action'])) {

    switch ($_GET['action']) {
        case 'list':
            $page = $_GET['page'];
            $rows = $_GET['rows'];

            echo $c->list($page, $rows);

            break;
        
        default:
            # code...
            break;
    }
}

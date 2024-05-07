<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Request-Headers, Authorization, TOKEN");

include_once("./utils/import.php");
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

$alimentationRepo = new AlimentationRepo();

if ($method == "GET") {
    $array = array();
    foreach ($alimentationRepo->getAll() as $key => $value) {
        array_push($array, $value->json());
    }
    
    echo json_encode(["response" => $array]);

} elseif ($method == "POST") {
    $data = $_POST;

    echo json_encode(["response" => $alimentationRepo->add($data)]);

} elseif ($method == "DELETE") {
    $alimentation_id = $_GET['alimentation_id'];

    echo json_encode(["response" => $alimentationRepo->delete($alimentation_id)]);

} else {
    echo json_encode(["response" => "Bad request"]);
}

?>

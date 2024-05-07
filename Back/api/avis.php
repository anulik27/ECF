<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization, TOKEN");

include_once("./utils/import.php");
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

$avisRepo = new AvisRepo();

if($method == "GET") {
    $array = array();
    foreach ($avisRepo->getAll() as $key => $value) {
        array_push($array, $value->json());
    }

    echo json_encode(
        ["response" => $array]
    );

} else if($method == "PUT") {
    $data = $_GET;

    echo json_encode(
        ["response" => $avisRepo->changeVisibility($data)]
    );

} else if($method == "DELETE") {
    $avis_id = $_GET["avis_id"];

    echo json_encode(
        ["response" => $avisRepo->delete($avis_id)]
    );

} else if($method == "POST") {
    $data = $_POST;

    echo json_encode(
        ["response" => $avisRepo->add($data)]
    );
} else {
    echo json_encode(
        ["response" => "Bad request"]
    );
}

?>
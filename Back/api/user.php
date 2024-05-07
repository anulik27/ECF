<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method,Access-Control-Request-Headers, Authorization, TOKEN");

include_once("./utils/import.php");
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

$userRepo = new UtilisateurRepo();

if($method == "GET") {
    $data = $_GET;

    echo json_encode(
        ["response" => $userRepo->auth($data)]
    );
} else if($method == "PUT") {

} else if($method == "DELETE") {

} else if($method == "POST") {
    $data = $_POST;

    echo json_encode(
        ["response" => $userRepo->add($data)]
    );
} else {
    echo json_encode(
        ["response" => "Bad request"]
    );
}




?>
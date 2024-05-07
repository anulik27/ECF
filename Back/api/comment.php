<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: HEAD, GET, POST, PUT, PATCH, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Request-Headers, Authorization, TOKEN");

include_once("./utils/import.php");
header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

$commentaireRepo = new CommentaireRepo();

if ($method == "GET") {
    $array = array();
    foreach ($commentaireRepo->getAll() as $key => $value) {
        array_push($array, $value->json());
    }
    
    echo json_encode(["response" => $array]);

} elseif ($method == "POST") {
    $data = $_GET;

    echo json_encode(["response" => $commentaireRepo->add($data)]);

} elseif ($method == "DELETE") {
    $commentaire_id = $_GET['commentaire_id'];

    echo json_encode(["response" => $commentaireRepo->delete($commentaire_id)]);

} else {
    echo json_encode(["response" => "Bad request"]);
}

?>

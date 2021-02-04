<?php

require_once __DIR__ . '/../../app/routes/route.php';
require_once __DIR__ . '/../../app/routes/Get.php';

$response = [];
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case GetController::Type():
        $handler = new RouteController(new GetController());
        $response = $handler->Handle($_GET);
        break;

    // case PostController::Type():
    // case PutController::Type():
    //     $data = json_decode(file_get_contents('php://input'), true);
    //     $postData = isset($data['params']) ? $data['params'] : [];

    //     $handler = new RouteController(new PostController());
    //     $response = $handler->Handle($postData);
    //     break;

    default:
        error_log("Invalid request: " . $requestType);
        break;
}

// error_log(print_r($response, true));

// Prepare our output stream to return JSON instead of HTML

header("Pragma: no-cache");
header("Expires: 0");
header("Cache-Control: no-cache");
header("Content-Disposition: inline; filename=\"api.json\"");
header('Content-type: text/json; charset=UTF-8');

// Convert the handler responses (PHP Arrays and Arrays of Arrays) to JSON and output it.
echo json_encode($response);//, JSON_PRETTY_PRINT);
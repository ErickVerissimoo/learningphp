<?php

namespace Src\projects;

use DateTime;
use mysqli;
use Src\Model\projects\Task;
use Src\Model\projects\TaskMapper;
require __DIR__ ."/../../vendor/autoload.php";

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$mysqli = new mysqli('172.17.0.2', 'erick', 'erick', 'teste');
if($uri == '/tasks'){
    
    $mapper = new TaskMapper($mysqli);
switch($method){
    case 'GET':
        
       
        echo json_encode( $mapper->getAll(10));
break;
case 'POST':
    $body = json_decode(file_get_contents('php://input'), true);
    $task = new Task($body['name'], $body['description'], new DateTime($body['scheduledAt']));
    $mapper -> create(task: $task);
    http_response_code(response_code:204);
break;
case 'DELETE':
    $mapper -> delete(id: $id);
    http_response_code(response_code:204);
    break;
    case 'PUT':
        $body = json_decode(file_get_contents('php://input'), true);
        $mapper -> update(    $task = new Task($body['name'], $body['description'], new DateTime($body['scheduledAt'])));
        http_response_code(response_code:203);
    }



}

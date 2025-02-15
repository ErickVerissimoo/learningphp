<?php

namespace Src\Model\projects;
use mysqli;
class TaskMapper
{
    private mysqli $mysqli;
    public function __construct(mysqli $mysqli){
        $this->mysqli = $mysqli;
    }

    public function create(Task $task){
        $sql = "insert into tarefa(name, description, scheduled) values(:name, :description, :scheduled);";
        $stmt = $this->mysqli->prepare(query: $sql);
        $stmt-> bind_param(":name", $task-> __get("name"));
        $stmt -> bind_param(":description", $task->__get("description"));
        $stmt -> bind_param(":scheduled", $task->__get("scheduled"));
        $stmt -> execute();
        $stmt->close();

    }
}
// 172.17.0.2
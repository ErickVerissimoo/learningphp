<?php

namespace Src\Model\projects;
use DateTime;
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
    public function update(Task $task){
        $sql = "update tarefa set name=:name, description=:description,
        scheduled=:scheduled where id=:id";
        $stmt = $this->mysqli->prepare(query: $sql);
        $stmt->bind_param(":name", $task-> __get("name"));
        $stmt -> bind_param(":description", $task->__get("description"));
        $stmt -> bind_param(":scheduled", $task->__get("scheduled"));
        $stmt -> bind_param(":id", $task->__get("id"));
        $stmt -> execute();
        $stmt->close();
    }
    public function delete(int $id){
        $stmt = $this->mysqli->prepare(query: "delete from tarefa where id=:id");
        $stmt->bind_param(":id", $id);
        $stmt->execute();
        $stmt->close();


    }
    public function get(int $id ): Task{
        $sql = "select * from tarefa where id =:id";
        $stmt = $this->mysqli->prepare(query: $sql);
        $stmt->bind_param("id", $id);
        $result=$this -> mysqli -> query($stmt) -> fetch_assoc();
        $date = new DateTime($result["scheduled"]);
        return new Task($result['name'], $result['description'], $date);
    }


public function getAll(?int $limit){
    
if($limit ==null):
    $sql = "select * from tabela";
    $result = $this->mysqli->query($sql);
    $objects =[];
    while($row = $result -> fetch_object(Task::class, ['name' ,   'description' , 'scheduledAt'])){
        yield $row;
    }
    
else:
$sql = "select * from tarefa limit = :limit";
$result = $this->mysqli->query($sql);
$objects =[];
while($row = $result -> fetch_object(Task::class, ['name',  'description', 'scheduledAt'])){
    yield $row;
}
endif;

}}
// 172.17.0.2
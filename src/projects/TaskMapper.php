<?php

namespace Src\Model\projects;

use DateTime;
use mysqli;
use PDO;

class TaskMapper
{
    private mysqli $mysqli;

    public function __construct(mysqli $mysqli)
    {
        $this->mysqli = $mysqli;
    }

    public function create(Task $task): void
    {
        if($this -> exists($task ->__get('name') )) {
throw new \Exception('Tarefa com mesmo nome já cadastrada');
        }
        $sql = "INSERT INTO tarefa (name, description, scheduled) VALUES (?, ?, ?)";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param(
            "sss",
            $task->__get("name"),
            $task->__get("description"),
            $task->__get("scheduled")
        );
        $stmt->execute();
        $stmt->close();
    }

    public function update(Task $task): void
    {
        
        $sql = "UPDATE tarefa SET name=?, description=?, scheduled=? WHERE id=?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param(
            "sssi",
            $task->__get("name"),
            $task->__get("description"),
            $task->__get("scheduled"),
            $task->__get("id")
        );
        $stmt->execute();
        $stmt->close();
    }

    public function delete(int $id): void
    {
        $stmt = $this->mysqli->prepare("DELETE FROM tarefa WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function get(int $id): Task
    {
        $sql = "SELECT * FROM tarefa WHERE id = ?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $taskData = $result->fetch_assoc();
        
        $stmt->close();

        if (!$taskData) {
            throw new \RuntimeException("Task not found");
        }

        return new Task(
            $taskData['name'],
            $taskData['description'],
            new DateTime($taskData['scheduled'])
        );
    }

    public function getAll(?int $limit): \Generator
    {
        if ($limit === null) {
            $result = $this->mysqli->query("SELECT * FROM tarefa");
            while ($task = $result->fetch_assoc()) {
                yield new Task(
                    $task['name'],
                    $task['description'],
                    new DateTime($task['scheduled'])
                );
            }
            return;
        }

        $stmt = $this->mysqli->prepare("SELECT * FROM tarefa LIMIT ?");
        $stmt->bind_param("i", $limit);
        $stmt->execute();
        
        $result = $stmt->get_result();
        while ($task = $result->fetch_assoc()) {
            yield new Task(
                $task['name'],
                $task['description'],
                new DateTime($task['scheduled'])
            );
        }
        
        $stmt->close();
    }

    private function exists(string $name): bool{
        $sql = "SELECT COUNT(*) FROM tarefa WHERE nome =?";
        $stmt = $this->mysqli->prepare($sql);
        $stmt->bind_param("s", $name);
        $stmt -> execute();
        $stmt -> bind_result($count);
        $stmt -> fetch();
        $stmt->close();
        return $count > 0;
    }
}
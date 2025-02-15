<?php

namespace Src\Model\projects;
use mysqli;
class TaskServiceImpl implements TaskService
{
    private TaskMapper $mapper;
    
    public function __construct(mysqli $sql){
$this->mapper = new TaskMapper($sql);
    }
    
    /**
     * @inheritDoc
     */
    public function createTask(Task $task): void {
    $this -> createTask($task);
    }
    
    /**
     * @inheritDoc
     */
    public function deleteTask(Task $task): void {
    $this ->mapper->delete($task->__get("id"));
    }
    
    /**
     * @inheritDoc
     */
    public function findTaskById(int $id): Task|null {
    return $this ->mapper->get($id)?? null;
    }
    
    /**
     * @inheritDoc
     */
    public function getTasks(int|null $limit): array {
        return $this ->mapper->get($limit)??[];
    }
    
    /**
     * @inheritDoc
     */
    public function updateTask(Task $task): void {
        $this ->mapper->update($task->__get("id"));
    }
}
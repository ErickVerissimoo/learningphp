<?php

namespace Src\Model\projects;

class TaskServiceImpl implements TaskService
{
    
    /**
     * @inheritDoc
     */
    public function createTask(Task $task): void {
    }
    
    /**
     * @inheritDoc
     */
    public function deleteTask(Task $task): void {
    }
    
    /**
     * @inheritDoc
     */
    public function findTaskById(int $id): Task|null {
    }
    
    /**
     * @inheritDoc
     */
    public function getTasks(int|null $limit): array {
    }
    
    /**
     * @inheritDoc
     */
    public function updateTask(Task $task): void {
    }
}
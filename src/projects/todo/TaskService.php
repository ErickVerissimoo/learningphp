<?php

namespace Src\projects;

interface TaskService
{
    public function createTask(Task $task): void;
    public function updateTask(Task $task): void;
    public function deleteTask(Task $task): void;
    public function getTasks(?int $limit): array;
    public function findTaskById(int $id): ?Task;
}
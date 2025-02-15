<?php

namespace Src\Model\projects;

interface TaskService
{
    function createTask(Task $task): void;
    function updateTask(Task $task): void;
    function deleteTask(Task $task): void;
    function getTasks(?int $limit): array;
    function findTaskById(int $id): ?Task;
}
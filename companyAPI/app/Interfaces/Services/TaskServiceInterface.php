<?php

namespace App\Interfaces\Services;

use App\Http\Requests\TaskRequest;
use App\Models\Task;

interface TaskServiceInterface {
    public function createTask(TaskRequest $request);
    public function indexTask();
    public function storeTask(TaskRequest $request);
    public function updateTask(TaskRequest $request, Task $task);
    public function deleteTask(Task $task);
}

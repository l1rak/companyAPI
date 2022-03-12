<?php

namespace App\Services;


use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Interfaces\Repositories\TaskRepositoryInterface;
use App\Interfaces\Services\TaskServiceInterface;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskService implements TaskServiceInterface {
    private $taskRepository;

    public function __construct(
        TaskRepositoryInterface $taskRepository
    ){
        $this->taskRepository = $taskRepository;
    }

    public function indexTask() {
      return  TaskResource::collection($this->taskRepository->all());
    }

    public function createTask(TaskRequest $request) {
        $task = $this->taskRepository->create($request->all());
        return new TaskResource($task);
    }

    public function storeTask(TaskRequest $request) {
        $task = $this->taskRepository->create($request->all());
      return response()->json($task, 200);
    }

    public function updateTask(TaskRequest $request, Task $task) {
      $task = $this->taskRepository->update($request->all());
      return response()->json($task);
    }

    public function deleteTask(Task $task) {
        $task = $this->taskRepository->destory($task->all());
        return response()->json($task);
    }
}

<?php

namespace App\Http\Controllers;

use App\Interfaces\Services\TaskServiceInterface;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    private $taskService;

    public function __construct(TaskServiceInterface $taskService){
        $this->taskService = $taskService;
    }

    public function index()
    {
      return  $this->taskService->indexTask();
    }


    public function create()
    {
      return  $this->taskService->createTask();
    }

    public function store(Request $request)
    {
       return $this->taskService->storeTask($request);
    }


    public function show(Task $task)
    {
       // $this->taskService->show()
    }


    public function edit(Task $task)
    {
        //
    }


    public function update(Request $request, Task $task)
    {
        //
    }


    public function destroy(Task $task)
    {
        //
    }
}

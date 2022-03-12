<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Interfaces\Services\EmployeeServiceInterface;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    private $employeeService;

    public function __construct(
        EmployeeServiceInterface $employeeService
    )
    {
        $this->employeeService = $employeeService;
    }

    public function index()
    {
      return  $this->employeeService->index();
    }


    public function create(EmployeeRequest $request)
    {
      return  $this->employeeService->create($request);
    }


    public function storeEmployee(EmployeeRequest $request)
    {
      return  $this->employeeService->storeEmployee($request);
    }


    public function showEmployee(Employee $employee)
    {
       return $this->employeeService->showEmployee($employee);
    }


    public function updateEmployee(EmployeeRequest $request, Employee $employee)
    {
        return $this->employeeService->updateEmployee($request, $employee);
    }


    public function delete(Employee $employee)
    {
        return $this->employeeService->deleteEmployee($employee);
    }
}

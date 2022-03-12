<?php

namespace App\Interfaces\Services;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

interface EmployeeServiceInterface {
    public function create(EmployeeRequest $request);
    public function storeEmployee(EmployeeRequest $request);
    public function index();
    public function updateEmployee(EmployeeRequest $request, Employee $employee);
    public function showEmployee($id);
    public function deleteEmployee(Employee $employee);
}

<?php

namespace App\Repositories;

use App\Interfaces\Repositories\EmployeeRepositoryInterface;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;

class EmployeeRepository extends BaseRepository implements  EmployeeRepositoryInterface {
    protected $model;

    public function __construct(Employee $employee)
    {
        parent::__construct($employee);
    }
}

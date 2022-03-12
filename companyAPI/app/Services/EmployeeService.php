<?php

namespace App\Services;

use App\Http\Requests\EmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Interfaces\Repositories\EmployeeRepositoryInterface;
use App\Interfaces\Services\EmployeeServiceInterface;
use App\Models\Employee;
use Illuminate\Http\Client\Request;

class EmployeeService implements EmployeeServiceInterface {

    private $employeeRepository;

    public function __construct(
        EmployeeRepositoryInterface $employeeRepository
    ){
        $this->employeeRepository = $employeeRepository;
    }

    public function create(EmployeeRequest $request){
        $employee = $this->employeeRepository->create($request->all());
        return new EmployeeResource($employee);
    }

    public function storeEmployee(EmployeeRequest $request){
        $employee = $this->employeeRepository->create($request->all());
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $employee['image'] = "$profileImage";
        }
        return new EmployeeResource($employee);
    }

    public function index() {
        return EmployeeResource::collection($this->employeeRepository->all());
    }

    public function showEmployee($id){
        $employee = $this->employeeRepository->findById($id);
        if (is_null($employee)) {
            $message = "There is no Company";
            $status = 422;
            return response(["message" => $message, $status]);
        }
        return new EmployeeResource($employee);
    }

    public function updateEmployee(EmployeeRequest $request, Employee $employee) {
        $employee = $this->employeeRepository->updateById($request->all());
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $employee['image'] = "$profileImage";
        }else{
            unset($employee['image']);
        }
        return new EmployeeResource($employee);
    }

    public function deleteEmployee(Employee $employee){
        $employee = $this->employeeRepository->destory($employee->all());
        return response()->json($employee);
    }

}

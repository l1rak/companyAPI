<?php

namespace App\Http\Controllers;

use App\Interfaces\Services\CompanyServiceInterface;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;


class CompanyController extends Controller
{

    private $companyService;


    public function __construct(CompanyServiceInterface $companyService){
        $this->companyService = $companyService;
    }

    public function create(CompanyRequest $request) {
       return $this->companyService->create($request);
    }


    public function index()
    {
        return $this->companyService->index();
    }


    public function store(CompanyRequest $request)
    {
    //    $validated = $request->validated();
        return $this->companyService->store($request);
    }


    public function show(Company $company)
    {
        return $this->companyService->show($company);
    }


    public function update(Request $request, Company $company)
    {
        return $this->companyService->update($request, $company);
    }

    public function delete(Company $company)
    {
        return $this->companyService->delete($company);
    }
}

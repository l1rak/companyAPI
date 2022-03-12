<?php

namespace App\Interfaces\Services;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

interface CompanyServiceInterface {
    public function create(CompanyRequest $request);
    public function store(CompanyRequest $request);
    public function index();
    public function show(Company $company);
    public function update(Request $request, Company $company);
    public function delete(Company $company);
}

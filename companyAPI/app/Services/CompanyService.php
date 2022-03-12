<?php

namespace App\Services;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Interfaces\Repositories\CompanyRepositoryInterface;
use App\Interfaces\Services\CompanyServiceInterface;
use App\Models\Company;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CompanyService implements CompanyServiceInterface {

    private $companyRepository;

    public function __construct(
        CompanyRepositoryInterface $companyRepository
    ){
        $this->companyRepository = $companyRepository;
    }

    public function create(CompanyRequest $request){
        $company = $this->companyRepository->create($request->all());
        return response()->json($company);
    }


    public function store(CompanyRequest $request){
        $company = $this->companyRepository->create($request->all());
        //  $company = DB::table('companies')->simplePaginate(10);
        return response()->json($company, 201);
    }

    public function  index() {
        return CompanyResource::collection($this->companyRepository->all());
    }

    public function show($id){
        $company = $this->companyRepository->findById($id);

        if (is_null($company)) {
            $message = "There is no Company";
            $status = 422;
            return response(["message" => $message, $status]);
        }

        return new CompanyResource($company);
    }

    public function update(Request $request, Company $company){
      //  $company->update($request->all());
        $company = $this->companyRepository->update($request->all());
        return response()->json($company);
    }

    public function delete(Company $company){
        $company = $this->companyRepository->destroy($company->all());
        return  response()->json($company);
    }

}

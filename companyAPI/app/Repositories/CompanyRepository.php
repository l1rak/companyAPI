<?php

namespace App\Repositories;

use App\Interfaces\Repositories\CompanyRepositoryInterface;
use App\Models\Company;
use Illuminate\Database\Eloquent\Model;

class CompanyRepository extends BaseRepository implements  CompanyRepositoryInterface {
    protected $model;

    public function __construct(Company $company)
    {
        parent::__construct($company);
    }

}

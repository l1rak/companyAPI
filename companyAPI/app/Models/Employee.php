<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $hidden = ['pivot'] ;


    protected $fillable = [
        'name',
        'surname',
        'status',
        'image',
        'email',
        'salary',
        'company_id'
    ];


    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function task(){
        return $this->hasMany(Employee::class);
    }
}

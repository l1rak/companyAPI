<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $list) {
            Employee::create([
                'name' => $faker-> firstName,
                'surname' => $faker-> lastName,
                'email' => $faker->email,
                'image' => $faker->image,
                'salary' => $faker->randomNumber(3, false),
                'is_active' => $faker->boolean(),
                'company_id' => Company::all()->random()->id
            ]);
        }
    }
}

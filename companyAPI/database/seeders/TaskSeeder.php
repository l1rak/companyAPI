<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();

        foreach (range(1,10) as $list) {
            Task::create([
                'name' => $faker-> jobTitle(),
                'extra' => $faker -> randomFloat(2, 0, 100),
                'employees_id' => Employee::all()->random()->id
            ]);
        }
    }
}

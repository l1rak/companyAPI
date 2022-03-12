<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;


class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

       foreach(range(1,10) as $list){
           DB::table('companies')->insert([
               "name"=> $faker -> name
               ]);
        }
//            foreach (range(1,10) as $list) {
//                Company::create([
//                    'name' => $faker-> company
//                ]);
            }
   //     Company::factory(10)->create();

}

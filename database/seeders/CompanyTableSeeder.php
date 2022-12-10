<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 50) as $key => $value) {
            Company::create(['name' => 'company '.$value,
                'email' => 'comapny'.$value.'@test.com',
                'website' => 'www.company'.$value.'.com', ]);
        }
    }
}

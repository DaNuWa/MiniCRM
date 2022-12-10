<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CompanyTableSeeder::class);

        \App\Models\User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
        \App\Models\User::factory()->count(15)->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();
        \App\Models\Company::factory(5)->create()->each(function ($company) {
            \App\Models\Employe::factory(10)->create([
                'company_id' => $company->id,
            ]);
        });

    }
}

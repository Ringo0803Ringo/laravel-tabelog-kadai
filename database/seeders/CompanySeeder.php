<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name' => '株式会社 名古屋飯',
            'postal_code' => '232-3232',
            'address' => '愛知県名古屋市中央1-1-13',
            'phone_number' => '0120-758-758'
        ]);
    }
}

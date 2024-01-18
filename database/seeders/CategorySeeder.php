<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate(); // データを全て削除

        Category::withoutEvents(function () {
            Category::create([
                'name' => 'カフェ'
            ]);

            Category::create([
                'name' => 'レストラン'
            ]);

            Category::create([
                'name' => '居酒屋'
            ]);

            Category::create([
                'name' => 'バー'
            ]);
            
            Category::create([
                'name' => 'その他'
            ]);
        });
    }
}

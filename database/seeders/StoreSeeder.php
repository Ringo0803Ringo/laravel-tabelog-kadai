<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Store::create([
                'name' => '店舗' . $i,
                'image' => 'https://placehold.jp/300x200.png',
                'description' => '店舗' . $i . 'の説明文です。',
                'business_hour' => '10:00~20:00',
                'price' => rand(1000, 5000),
                'postal_code' => '150-0043',
                'address' => '東京都渋谷区道玄坂' . $i . '-1-1',
                'phone_number' => '090-1234-567' . $i,
                'holiday' => '毎週月曜日',
            ]);
        }
    }
}

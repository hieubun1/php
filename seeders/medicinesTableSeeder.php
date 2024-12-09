<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class medicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create(); // Khởi tạo Faker

        // Lặp 100 lần để tạo 100 bản ghi
        for ($i = 0; $i < 100; $i++) {
            DB::table('medicines')->insert([
                'name' => $faker->word, // Tên thuốc
                'brand' => $faker->company, // Thương hiệu
                'dosage' => $faker->word, // Liều lượng
                'form' => $faker->word, // Dạng thuốc
                'price' => $faker->randomFloat(2, 10, 1000), // Giá từ 10 đến 1000, 2 chữ số thập phân
                'stock' => $faker->numberBetween(0, 1000), // Số lượng tồn kho
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

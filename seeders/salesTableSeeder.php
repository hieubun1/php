<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class salesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create(); // Khởi tạo Faker

        // Lấy tất cả ID của các sản phẩm trong bảng medicines
        $medicine_ids = DB::table('medicines')->pluck('medicine_id')->toArray();

        // Lặp 100 lần để tạo 100 bản ghi bán hàng
        for ($i = 0; $i < 100; $i++) {
            DB::table('sales')->insert([
                'medicine_id' => $faker->randomElement($medicine_ids), // ID thuốc ngẫu nhiên
                'quantity' => $faker->numberBetween(1, 10), // Số lượng bán ra (từ 1 đến 10)
                'sale_date' => $faker->dateTimeThisYear, // Ngày giờ bán hàng trong năm nay
                'customer_phone' => substr($faker->phoneNumber, 0, 20), // Giới hạn số điện thoại tối đa 20 ký tự
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}


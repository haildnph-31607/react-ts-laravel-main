<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('coupons')->insert(
            [
                'sku' => 'HAPPY',
                'discount' => 10,
                'start' => '2024-07-10 16:22:40',
                'end' => '2024-07-15 16:22:40',
                'created_at' => '2024-07-10 16:22:40',
                'updated_at' => '2024-07-10 16:22:40',

            ]
        );
    }
}

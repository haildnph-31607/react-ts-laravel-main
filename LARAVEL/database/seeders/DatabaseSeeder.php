<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //tạo 1 bản ghi

        //tạo 10 bản gi random
        $coupon =[];
        for($i = 0 ; $i< 10 ; $i++){
           $coupon[]= [
                 'sku'=>fake()->name(),
                 'discount'=>fake()->numberBetween(0,1),
                 'price'=>fake()->randomFloat(2,1000,5000)
           ];
        }
        DB:: table('coupons')->insert($coupon);
        $this->call([
            CategorySeeder::class,
            CouponSeeder::class,
        ]);
    }
}

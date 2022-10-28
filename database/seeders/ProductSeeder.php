<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
            'name'=>'LG mobile',
            'price'=>'100$',
            'description'=>'mobile with 4gb ram and 18 mp camera',
            'category'=>'Mobile',
            'gallery'=>'https://www.sathya.store/img/category/0g4mKAv6EDEpxdUt.jpeg'
        
            ],
            [
                'name'=>'MI TV',
                'price'=>'200$',
                'description'=>'TV with 14 inches screen  and 18 mp camera',
                'category'=>'TV',
                'gallery'=>'https://m.media-amazon.com/images/I/91qr6r1d8KS._AC_SL1500_.jpg'
            ],
            [
                'name'=>'Sony TV',
                'price'=>'500$',
                'description'=>'TV with much more screen  and 18 mp camera',
                'category'=>'TV',
                'gallery'=>'https://www.ikea.com/de/de/images/products/hemnes-…-weiss-gebeizt-hellbraun__0850139_pe671188_s5.jpg'
            ],
            [
                'name'=>'Sony fridge',
                'price'=>'500$',
                'description'=>'TV with much more screen  and 18 mp camera',
                'category'=>'fridge',
                'gallery'=>'https://dynamic.indigoimages.ca//v1/gifts/little-t…listic/050743651427/1.jpg?width=614&maxheight=614'
            ],

        ]
    );
    }
}

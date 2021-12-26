<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $date = date('Y-m-d H:i:s');
        $data = [

            ['name' => 'Fresh Meat', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Vegetables', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Fruit & Nut Gifts', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Fresh Berries', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Ocean Foods', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Butter & Eggs', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Fastfood', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Fresh Onion', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Oatmeal', 'created_at' => $date, 'updated_at' => $date],

        ];

        DB::table('categories')->insert($data);
    }
}

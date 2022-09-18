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
        $date = date('Y-m-d H:i:s');
        $data = [

            ['name' => 'Văn học', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Kinh tế', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Tâm lý - Kỹ năng sống', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Balo-Túi cặp', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Hoạ phẩm', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Dụng cụ học tập', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Đồ chơi', 'created_at' => $date, 'updated_at' => $date],
        ];

        DB::table('categories')->insert($data);
    }
}

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
            ['name' => 'Nuôi dạy con', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Sách thiếu nhi', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Tiểu sử - Hồi ký', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Sách ngoại ngữ', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Sách mới', 'created_at' => $date, 'updated_at' => $date],
        ];

        DB::table('categories')->insert($data);
    }
}

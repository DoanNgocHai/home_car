<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gears;
use Illuminate\Support\Facades\DB;

class GearsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            [
                'id' => 1,
                'name' => 'Số sàn',
                'slug' => 'so-san',
                
            ],
            [
                'id_role' => 2,
                'name' => 'Số tự động',
                'slug' => 'so-tu-dong',
            ]
        ];
        DB::table('gears')->insert($array);
        
    }
}

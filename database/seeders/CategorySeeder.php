<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category = [
            ['name'=>'Bóng đá'],
            ['name'=>'Thời sự'],
            ['name'=>'Show biz'],
            ['name'=>'Thế giới'],
            ['name'=>'Giáo dục'],
            ['name'=>'Pháp luật'],
            ];
        
        DB::table('categories')->insert($category);
    }
}

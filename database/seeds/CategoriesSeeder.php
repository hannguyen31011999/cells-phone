<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            [
                'categories_name'=>'Apple',
                'categories_image'=>'iPhone-(Apple)42-b_52.jpg',
                'categories_desc'=>'Apple là một thương hiệu nghìn tỷ dollar, một thương hiệu sang trọng và đẳng cấp'
            ]
        ]);
    }
}

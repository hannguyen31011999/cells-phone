<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user')->insert([
            ['email'=>'hannguyen3111999@gmail.com','password'=>Hash::make('123'),'fullname'=>'Nguyễn Việt Hân','gender'=>0,'phone'=>'0382484093','address'=>'50 đường 144,phường Tân Phú,Q9','point'=>0,'status'=>1,'role'=>2],
        ]);
    }
}

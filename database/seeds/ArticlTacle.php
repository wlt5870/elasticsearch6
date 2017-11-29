<?php

use Illuminate\Database\Seeder;

class ArticlTacle extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('atricls')->insert([
            ['name'=>'xiao','age'=>1],
            ['name'=>'xiao2','age'=>12],
            ['name'=>'xiao3','age'=>12]
        ]);
    }
}

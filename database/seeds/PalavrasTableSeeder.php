<?php

use Illuminate\Database\Seeder;

class PalavrasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('palavras')->insert([
            'name'=>'Gaivota',
            'categoria_id'=>'1',
            
        ]);
        DB::table('palavras')->insert([
            'name'=>'Elefante',
            'categoria_id'=>'2',
            
        ]);
    }
}

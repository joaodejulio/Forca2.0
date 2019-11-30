<?php

use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'name'=>'Passaro',
            
        ]);
        DB::table('categorias')->insert([
            'name'=>'Mamifero',
            
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $data = [
            [
                'nombre' => 'JUGUETERIA',
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'nombre' => 'DEPORTES',
                'created_at' => date("Y-m-d H:i:s")                
            ],
            [
                'nombre' => 'ELECTRONICA',
                'created_at' => date("Y-m-d H:i:s")                
            ],            


        ];
        DB::table('categorias')->insert($data); 
    }
}

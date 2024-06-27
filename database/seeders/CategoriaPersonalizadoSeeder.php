<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoriaPersonalizado;

class CategoriaPersonalizadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoriaPersonalizado::factory()->count(5)->sequence(
            ['nome'=> 'Bolo Morango kg'],
            ['nome'=> 'Bolo Chocolate kg'],
            ['nome'=> 'Bolo Red Velvet kg'],
            ['nome'=> 'Bolo Baunilha kg'],
            ['nome'=> 'Bolo Marta Rocha kg'],)->create();
    }
}

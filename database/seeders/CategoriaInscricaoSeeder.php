<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoriaInscricao;

class CategoriaInscricaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        public function run(): void
        {
            CategoriaInscricao::factory()->count(4)->sequence(
                ['nome'=> 'Crossaint de Morango com chocolate'],
                ['nome'=> 'Café Expresso + Pão de Queijo'],
                ['nome'=> 'Fatia de Bolo Red Velvet '],
                ['nome'=> 'Escolha nossas massas folhadas'] )->create();
        }
       
    }
}
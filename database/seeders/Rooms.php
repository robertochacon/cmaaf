<?php

namespace Database\Seeders;

use App\Models\Rooms as ModelsRooms;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Rooms extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsRooms::create(['name' => 'Sala 1','areas' => ['Laboratorio','Imágenes','Resultados']]);
        ModelsRooms::create(['name' => 'Sala 2','areas' => ['Laboratorio']]);
        ModelsRooms::create(['name' => 'Sala 3','areas' => ['Consultas']]);
        ModelsRooms::create(['name' => 'Sala 4','areas' => ['Consultas']]);
        ModelsRooms::create(['name' => 'Sala 5','areas' => ['Consultas']]);
        ModelsRooms::create(['name' => 'Sala 6','areas' => ['Resultados']]);
        ModelsRooms::create(['name' => 'Sala 7','areas' => ['Imágenes']]);
    }
}

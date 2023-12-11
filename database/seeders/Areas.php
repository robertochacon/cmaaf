<?php

namespace Database\Seeders;

use App\Models\Areas as ModelsAreas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Areas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsAreas::create([
            'name' => 'Facturación',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        ModelsAreas::create([
            'name' => 'Laboratorio',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        ModelsAreas::create([
            'name' => 'Imágenes',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        ModelsAreas::create([
            'name' => 'Consultas',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        ModelsAreas::create([
            'name' => 'Resultados',
            'created_at' => date("Y-m-d H:i:s")
        ]);

    }
}

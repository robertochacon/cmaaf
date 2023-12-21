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
            'acronym' => 'FAC',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        ModelsAreas::create([
            'name' => 'Laboratorio',
            'acronym' => 'LAB',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        ModelsAreas::create([
            'name' => 'Imágenes',
            'acronym' => 'IMA',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        ModelsAreas::create([
            'name' => 'Consultas',
            'acronym' => 'CON',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        ModelsAreas::create([
            'name' => 'Resultados',
            'acronym' => 'RES',
            'created_at' => date("Y-m-d H:i:s")
        ]);

    }
}

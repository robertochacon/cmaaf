<?php

namespace Database\Seeders;

use App\Models\Services as ModelsServices;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Services extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //services of image
        ModelsServices::create(['name' => 'Rayos X', 'type' => 'image']);
        ModelsServices::create(['name' => 'Mamografía', 'type' => 'image']);
        ModelsServices::create(['name' => 'Sonografía', 'type' => 'image']);
        ModelsServices::create(['name' => 'Tomografía', 'type' => 'image']);
        ModelsServices::create(['name' => 'Doppler', 'type' => 'image']);
        ModelsServices::create(['name' => 'Ecocardiograma', 'type' => 'image']);
        ModelsServices::create(['name' => 'Holter', 'type' => 'image']);
        ModelsServices::create(['name' => 'Mapa', 'type' => 'image']);

        //services of laboratory
        ModelsServices::create(['name' => 'Hematología', 'type' => 'laboratory']);
        ModelsServices::create(['name' => 'Uroanálisis', 'type' => 'laboratory']);
        ModelsServices::create(['name' => 'Parasitología', 'type' => 'laboratory']);
        ModelsServices::create(['name' => 'Microbiología', 'type' => 'laboratory']);
        ModelsServices::create(['name' => 'Medio ambiente', 'type' => 'laboratory']);
        ModelsServices::create(['name' => 'Inmunoserología', 'type' => 'laboratory']);
        ModelsServices::create(['name' => 'Quimica sanguínea', 'type' => 'laboratory']);
        ModelsServices::create(['name' => 'Pruebas virales', 'type' => 'laboratory']);
        ModelsServices::create(['name' => 'Pruebas especiales', 'type' => 'laboratory']);
        ModelsServices::create(['name' => 'Pruebas hormonales', 'type' => 'laboratory']);
        ModelsServices::create(['name' => 'Microbiología de agua', 'type' => 'laboratory']);
        ModelsServices::create(['name' => 'Pruebas toxicológicas', 'type' => 'laboratory']);
        ModelsServices::create(['name' => 'Pruebas de parternidad(ADN)', 'type' => 'laboratory']);
        ModelsServices::create(['name' => 'Microbiología de alimentos', 'type' => 'laboratory']);
        ModelsServices::create(['name' => 'Microbiología de cosméticos', 'type' => 'laboratory']);
        ModelsServices::create(['name' => 'Análisis físico químico de agua', 'type' => 'laboratory']);
        ModelsServices::create(['name' => 'Microbiología de medicamentos', 'type' => 'laboratory']);

        //services of consultation
        ModelsServices::create(['name' => 'Medicina familiar', 'type' => 'consultation']);
        ModelsServices::create(['name' => 'Cardiología', 'type' => 'consultation']);
        ModelsServices::create(['name' => 'Otorrino', 'type' => 'consultation']);
        ModelsServices::create(['name' => 'Nefrología', 'type' => 'consultation']);
        ModelsServices::create(['name' => 'Nutrición', 'type' => 'consultation']);
        ModelsServices::create(['name' => 'Ginecología', 'type' => 'consultation']);
        ModelsServices::create(['name' => 'Urología', 'type' => 'consultation']);
        ModelsServices::create(['name' => 'Neumología', 'type' => 'consultation']);
        ModelsServices::create(['name' => 'Diabetología', 'type' => 'consultation']);
        ModelsServices::create(['name' => 'Psicología', 'type' => 'consultation']);
        ModelsServices::create(['name' => 'Pediatría', 'type' => 'consultation']);
        ModelsServices::create(['name' => 'ortopedía', 'type' => 'consultation']);
        ModelsServices::create(['name' => 'Cirugia general', 'type' => 'consultation']);
        ModelsServices::create(['name' => 'Gastroenterología', 'type' => 'consultation']);
        ModelsServices::create(['name' => 'Medicina interna', 'type' => 'consultation']);
        ModelsServices::create(['name' => 'Neurología', 'type' => 'consultation']);
        ModelsServices::create(['name' => 'Radiología', 'type' => 'consultation']);
        ModelsServices::create(['name' => 'Sonografista', 'type' => 'consultation']);
        ModelsServices::create(['name' => 'Ecografista', 'type' => 'consultation']);

    }
}

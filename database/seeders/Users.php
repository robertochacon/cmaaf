<?php

namespace Database\Seeders;

use App\Models\User as ModelsUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsUser::create([
            'name' => 'Super Administrador',
            'email' => 'super@admin.com',
            'password' => bcrypt('super'),
            'room' => 'Sala 1',
            'area' => 'Facturación',
            'window' => '1',
            'remember_token' => null,
            'type' => 'super',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        ModelsUser::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'room' => 'Sala 1',
            'area' => 'Facturación',
            'window' => '1',
            'remember_token' => null,
            'type' => 'admin',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        ModelsUser::create([
            'name' => 'Consulta',
            'email' => 'consulta@admin.com',
            'password' => bcrypt('consulta'),
            'room' => 'Sala 3',
            'area' => 'Consultas',
            'window' => '1',
            'services' => ['Cardiología','Ginecología','Diabetología'],
            'remember_token' => null,
            'type' => 'doctor',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        ModelsUser::create([
            'name' => 'Laboratorio',
            'email' => 'laboratorio@admin.com',
            'password' => bcrypt('laboratorio'),
            'room' => 'Sala 3',
            'area' => 'Laboratorio',
            'window' => '1',
            'services' => ['Parasitología','Uroanálisis','Pruebas virales'],
            'remember_token' => null,
            'type' => 'doctor',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        ModelsUser::create([
            'name' => 'Resultados',
            'email' => 'resultado@admin.com',
            'password' => bcrypt('resultado'),
            'room' => 'Sala 6',
            'area' => 'Resultados',
            'window' => '1',
            'services' => null,
            'remember_token' => null,
            'type' => 'doctor',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        ModelsUser::create([
            'name' => 'Imágenes',
            'email' => 'imagen@admin.com',
            'password' => bcrypt('imagen'),
            'room' => 'Sala 7',
            'area' => 'Imágenes',
            'window' => '1',
            'services' => ['Sonografía','Mamografía','Radiología'],
            'remember_token' => null,
            'type' => 'doctor',
            'created_at' => date("Y-m-d H:i:s")
        ]);

    }
}

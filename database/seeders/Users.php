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
            'areas' => ['Laboratorio','Imágenes','Resultados'],
            'window' => '1',
            'remember_token' => null,
            'type' => 'super',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        ModelsUser::create([
            'name' => 'Administrador general',
            'email' => 'ag@admin.com',
            'password' => bcrypt('admin'),
            'room' => 'Sala 1',
            'areas' => ['Laboratorio','Imágenes','Resultados'],
            'window' => '1',
            'remember_token' => null,
            'type' => 'admin',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        ModelsUser::create([
            'name' => 'Administrador consultorios',
            'email' => 'ac@admin.com',
            'password' => bcrypt('admin'),
            'room' => 'Sala 3',
            'areas' => ['Consultas'],
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
            'areas' => ['Consultas'],
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
            'areas' => ['Laboratorio'],
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
            'areas' => ['Resultados'],
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
            'areas' => ['Imágenes'],
            'window' => '1',
            'services' => ['Sonografía','Mamografía','Radiología'],
            'remember_token' => null,
            'type' => 'doctor',
            'created_at' => date("Y-m-d H:i:s")
        ]);

//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////// Usuarios de asistencia en facturacion ///////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////

        ModelsUser::create([
            'name' => 'Posición 1',
            'email' => 'p1@cmaa',
            'password' => bcrypt('p1cmaa'),
            'room' => 'Sala 1',
            'areas' => ['Laboratorio','Imágenes','Resultados'],
            'window' => '1',
            'remember_token' => null,
            'type' => 'admin',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        ModelsUser::create([
            'name' => 'Posición 2',
            'email' => 'p2@cmaa',
            'password' => bcrypt('p2cmaa'),
            'room' => 'Sala 1',
            'areas' => ['Laboratorio','Imágenes','Resultados'],
            'window' => '1',
            'remember_token' => null,
            'type' => 'admin',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        ModelsUser::create([
            'name' => 'Posición 3',
            'email' => 'p3@cmaa',
            'password' => bcrypt('p3cmaa'),
            'room' => 'Sala 1',
            'areas' => ['Laboratorio','Imágenes','Resultados'],
            'window' => '1',
            'remember_token' => null,
            'type' => 'admin',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        ModelsUser::create([
            'name' => 'Posición 4',
            'email' => 'p4@cmaa',
            'password' => bcrypt('p4cmaa'),
            'room' => 'Sala 1',
            'areas' => ['Laboratorio','Imágenes','Resultados'],
            'window' => '1',
            'remember_token' => null,
            'type' => 'admin',
            'created_at' => date("Y-m-d H:i:s")
        ]);

    }
}

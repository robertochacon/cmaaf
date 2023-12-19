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
            'area' => 'Facturacion',
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
            'area' => 'Facturacion',
            'window' => '1',
            'remember_token' => null,
            'type' => 'admin',
            'created_at' => date("Y-m-d H:i:s")
        ]);

        ModelsUser::create([
            'name' => 'Doctor',
            'email' => 'doctor@doctor.com',
            'password' => bcrypt('doctor'),
            'room' => 'Sala 3',
            'area' => 'Consultorio',
            'window' => '1',
            'services' => ['Sonografía','Mamografía','Radiología'],
            'remember_token' => null,
            'type' => 'doctor',
            'created_at' => date("Y-m-d H:i:s")
        ]);
    }
}

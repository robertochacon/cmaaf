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
        ModelsRooms::create(['name' => 'Sala 1']);
        ModelsRooms::create(['name' => 'Sala 2']);
        ModelsRooms::create(['name' => 'Sala 3']);
        ModelsRooms::create(['name' => 'Sala 4']);
        ModelsRooms::create(['name' => 'Sala 5']);
        ModelsRooms::create(['name' => 'Sala 6']);
        ModelsRooms::create(['name' => 'Sala 7']);
    }
}

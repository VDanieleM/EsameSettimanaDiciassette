<?php

namespace Database\Seeders;

use App\Models\Progetto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgettoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Progetto::factory(5)->create();
    }
}

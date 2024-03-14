<?php

namespace Database\Seeders;

use App\Models\Attivita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttivitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attivita::factory(15)->create();
    }
}

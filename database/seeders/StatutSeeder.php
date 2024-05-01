<?php

namespace Database\Seeders;

use App\Models\TypeVisite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeVisite::create(['nom' => 'Prévue']);
        TypeVisite::create(['nom' => 'Non-Prévue']);
    }
}

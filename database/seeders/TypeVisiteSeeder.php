<?php

namespace Database\Seeders;

use App\Models\Statut;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeVisiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Statut::create(['nom' => 'Annulée']);
        Statut::create(['nom' => 'Planifiée']);
        Statut::create(['nom' => 'Terminée']);
        Statut::create(['nom' => 'En cours']);
    }
}

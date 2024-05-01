<?php

namespace Database\Seeders;

use App\Models\Personnel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker; // Importez la classe Faker

class PersonnelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create(); // Créez une instance de Faker

        Personnel::create([
            'nom' => 'admin',
            'prenom' => 'admin',
            'telephone' => $faker->phoneNumber, // Génère un numéro de téléphone fictif
            'poste' => $faker->jobTitle, // Génère un titre de poste fictif
        ]);
    }
}

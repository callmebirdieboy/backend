<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('movies')->insert([
                'title' => $faker->sentence(3), // Genera un título de 3 palabras
                'synopsis' => $faker->paragraph(5), // Genera una sinopsis de 5 oraciones
                'year' => $faker->year, // Genera un año aleatorio
                'cover' => $faker->imageUrl(640, 480, 'movies', true), // Genera una URL de imagen falsa
                'created_at' => now(), // Fecha de creación actual
                'updated_at' => now(), // Fecha de actualización actual
            ]);
        }
    }
}

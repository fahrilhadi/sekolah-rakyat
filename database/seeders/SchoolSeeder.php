<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        School::firstOrCreate(
            [
                'code' => 'SR-PKU',
            ],
            [
                'name' => 'Sekolah Rakyat Pekanbaru',
                'slug' => 'sekolah-rakyat-pekanbaru',
                'is_active' => true,
            ]
        );
    }
}

<?php

namespace Database\Seeders;

use App\Models\TypeService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeService::create([
            'name_service' => 'General Chemical',
            'desc_service' => 'Kategori layanan purna jual untuk bahan kimia umum atau general chemical',
        ]);
        TypeService::create([
            'name_service' => 'Specialty Chemical',
            'desc_service' => 'Kategori layanan purna jual untuk bahan kimia khusus seperti Rojen',
        ]);
        TypeService::create([
            'name_service' => 'General Chemical & Boiler Chemical',
            'desc_service' => 'Kategori layanan purna jual untuk bahan kimia umum & boiler',
        ]);
    }
}

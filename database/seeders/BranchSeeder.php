<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::create([
            'name_branch' => 'Pekanbaru',
            'phone' => '(0761) 5795004',
            'address' => 'Jl. Riau, Gg. Harapan 2',
            'npwp' => '21.856.184.3-211.205',
        ]);
        Branch::create([
            'name_branch' => 'Medan',
            'phone' => '(061) 42776613',
            'address' => 'Jl. Menteng VII Komplek Menteng Indah Blok A4 No.5 Medan Denai Sumatera Utara',
            'npwp' => '09.826.055.7-211.205',
        ]);
        Branch::create([
            'name_branch' => 'Pontianak',
            'phone' => 'Unavailable',
            'address' => 'Pergudangan equator',
            'npwp' => '09.826.055.7-211.205',
        ]);
    }
}

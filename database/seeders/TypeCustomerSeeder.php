<?php

namespace Database\Seeders;

use App\Models\TypeCustomer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeCustomer::create([
            'name_type_customer' => 'PKS/Industrial',
            'desc_type_customer' => 'Kategori ini digunakan untuk customer dengan bidang usaha PKS atau Industrial',
        ]);
        TypeCustomer::create([
            'name_type_customer' => 'PDAM/UPTD',
            'desc_type_customer' => 'Kategori ini digunakan untuk customer dengan bidang usaha PDAM atau UPTD',
        ]);
        TypeCustomer::create([
            'name_type_customer' => 'Hotel',
            'desc_type_customer' => 'Kategori ini digunakan untuk customer dengan bidang usaha Hotel',
        ]);
        TypeCustomer::create([
            'name_type_customer' => 'RT/RW',
            'desc_type_customer' => 'Kategori ini digunakan untuk customer rumah tangga atau individual',
        ]);
    }
}

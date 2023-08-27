<?php

namespace Database\Seeders;

use App\Models\TypeAction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeAction::create([
            'name_action' => 'Mapping',
            'detail_action' => 'Aktivitas sales/marketing tahap Pertama',
            'status_action' => 'Prospect',
            'priority_action' => 'prospect',
        ]);
        TypeAction::create([
            'name_action' => 'Introduction',
            'detail_action' => 'Aktivitas sales/marketing tahap kedua',
            'status_action' => 'Prospect',
            'priority_action' => 'prospect',
        ]);
        TypeAction::create([
            'name_action' => 'Penetrasi',
            'detail_action' => 'Aktivitas sales/marketing tahap ketiga',
            'status_action' => 'Prospect',
            'priority_action' => 'prospect',
        ]);
        TypeAction::create([
            'name_action' => 'Jartest',
            'detail_action' => 'Aktivitas sales/marketing tahap keempat',
            'status_action' => 'Prospect',
            'priority_action' => 'prospect',
        ]);
        TypeAction::create([
            'name_action' => 'Penawaran',
            'detail_action' => 'Aktivitas sales/marketing tahap kelima',
            'status_action' => 'Prospect',
            'priority_action' => 'prospect',
        ]);
        TypeAction::create([
            'name_action' => 'Negosiasi',
            'detail_action' => 'Aktivitas sales/marketing tahap keenam',
            'status_action' => 'Prospect',
            'priority_action' => 'prospect',
        ]);
        TypeAction::create([
            'name_action' => 'Deal',
            'detail_action' => 'Aktivitas sales/marketing tahap ketujuh',
            'status_action' => 'Hot Prospect',
            'priority_action' => 'hot-prospect',
        ]);
        TypeAction::create([
            'name_action' => 'Purchase Order (PO)',
            'detail_action' => 'Aktivitas sales/marketing tahap kedelapan',
            'status_action' => 'Hot Prospect',
            'priority_action' => 'hot-prospect',
        ]);
        TypeAction::create([
            'name_action' => 'Supply & Maintenace',
            'detail_action' => 'Aktivitas sales/marketing tahap kesembilan',
            'status_action' => 'Hot Prospect',
            'priority_action' => 'final-prospect',
        ]);
    }
}

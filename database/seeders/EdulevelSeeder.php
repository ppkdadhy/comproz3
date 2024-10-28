<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Tambahkan ini

class EdulevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * CARA EKSEKUSI : php artisan db:seed --class=EdulevelSeeder
     */
    public function run(): void
    {
        DB::table('edulevels')->insert([
            [
            'name' => 'SD Sederajat',
            'desc' => 'SD / MI',
            ], //jika mau jadi array assosiative tambahkan seperti ini dan tambah [[],[]]->
            [
                'name' => 'SD Sederajat',
                'desc' => 'SMP / MTs',
            ]
    ]);
    }
}


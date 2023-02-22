<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kategori::create([
            'name' => 'Baju',
        ]);

        Kategori::create([
            'name' => 'Celana',
        ]);

        Kategori::create([
            'name' => 'Topi',
        ]);

        Kategori::create([
            'name' => 'Rok',
        ]);
    }
}

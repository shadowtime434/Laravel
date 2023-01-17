<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'nama_menu' => 'kopicup',
            'harga' => '1000',
            'deskripsi' => 'minuman warnet',
            'ketersediaan' => '50'
        ]);
    }
}

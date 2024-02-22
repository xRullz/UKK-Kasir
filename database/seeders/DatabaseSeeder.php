<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Barang;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        //Barang
        Barang::create([
            'nama_barang' => 'Sabun batang',
            'stok' => '30',
            'harga_satuan' => '3000',
        ]);

        Barang::create([
            'nama_barang' => 'Mi Instan',
            'stok' => '30',
            'harga_satuan' => '2000',
        ]);

        Barang::create([
            'nama_barang' => 'Pensil',
            'stok' => '30',
            'harga_satuan' => '1000',
        ]);

        Barang::create([
            'nama_barang' => 'Kopi sachet',
            'stok' => '30',
            'harga_satuan' => '1500',
        ]);

        Barang::create([
            'nama_barang' => 'Air minum galon',
            'stok' => '30',
            'harga_satuan' => '20000',
        ]);
        //Barang

        //User
        User::create([
            'name' => 'Radhitt',
            'role' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
        User::create([
            'name' => 'Reyhan Fajar',
            'role' => 'kasir',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('kasir123'),
        ]);
        //User
    }
}

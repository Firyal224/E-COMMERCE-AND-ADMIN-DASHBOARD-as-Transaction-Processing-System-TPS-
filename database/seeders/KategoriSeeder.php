<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategori;
class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      

        $post = Kategori::create([     
            'nama' => 'Man s Dressed',
            'images' => 'cat-1.jpg',
        ]);
        $post = Kategori::create([     
            'nama' => 'Woman s Dressed',
            'images' => 'cat-2.jpg',
        ]);
        $post = Kategori::create([     
            'nama' => 'Beuty',
            'images' => 'avoskin.jpg',
        ]);
        $post = Kategori::create([     
            'nama' => 'Electronic',
            'images' => 'cat-4.jpg',
        ]);
        $post = Kategori::create([     
            'nama' => 'Bags',
            'images' => 'cat-5.jpg',
        ]);
        $post = Kategori::create([     
            'nama' => 'Shoes',
            'images' => 'cat-6.jpg',
        ]);
    }
}

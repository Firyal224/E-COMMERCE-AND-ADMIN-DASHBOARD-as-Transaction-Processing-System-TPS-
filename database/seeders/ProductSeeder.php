<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $post = Products::create([
            'id_kategori' => '2',
            'nama' => 'Korean Dressed',
            'harga' => 98000,
            'images' => 'product-1.jpg',
            'detail' => 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.',
        ]);
        $post = Products::create([
            'id_kategori' => '1',
            'nama' => 'Leather jacket',
            'harga' => 123000,
            'images' => 'product-3.jpg',
            'detail' => 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.',
        ]);
        $post = Products::create([
            'id_kategori' => '2',
            'nama' => 'Long Puter',
            'harga' => 180000,
            'images' => 'product-7.jpg',
            'detail' => 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.',
        ]);
        $post = Products::create([
            'id_kategori' => '3',
            'nama' => 'Avoskin',
            'harga' => 120000,
            'images' => 'avoskin-1.jpg',
            'detail' => 'Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam stet sit clita ea. Sanc invidunt ipsum et, labore clita lorem magna lorem ut. Erat lorem duo dolor no sea nonumy. Accus labore stet, est lorem sit diam sea et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.',
        ]);
    }
}

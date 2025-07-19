<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Shukriya',
                'description' => 'Beras premium berkualitas tinggi dengan butiran panjang dan aroma yang harum. Cocok untuk hidangan istimewa.',
                'price' => 200000,
                'image' => 'beras1.jpg',
                'stock' => 50,
                'category' => 'Beras Premium',
                'weight' => 25.0,
                'origin_country' => 'India',
                'is_active' => true,
            ],
            [
                'name' => 'Aura',
                'description' => 'Beras impor dengan kualitas terbaik, tekstur pulen dan rasa yang lezat.',
                'price' => 195000,
                'image' => 'beras2.jpg',
                'stock' => 45,
                'category' => 'Beras Impor',
                'weight' => 25.0,
                'origin_country' => 'Thailand',
                'is_active' => true,
            ],
            [
                'name' => 'JabalNur',
                'description' => 'Beras organik pilihan dengan proses pengolahan yang higienis dan berkualitas.',
                'price' => 170000,
                'image' => 'beras3.jpg',
                'stock' => 60,
                'category' => 'Beras Organik',
                'weight' => 25.0,
                'origin_country' => 'Pakistan',
                'is_active' => true,
            ],
            [
                'name' => 'IndiaFeast',
                'description' => 'Beras basmati asli India dengan aroma khas dan butiran yang panjang.',
                'price' => 200000,
                'image' => 'beras4.jpg',
                'stock' => 40,
                'category' => 'Beras Premium',
                'weight' => 25.0,
                'origin_country' => 'India',
                'is_active' => true,
            ],
            [
                'name' => 'DaawatSella',
                'description' => 'Beras sella berkualitas premium dengan proses parboiling yang sempurna.',
                'price' => 195000,
                'image' => 'beras5.jpg',
                'stock' => 35,
                'category' => 'Beras Premium',
                'weight' => 25.0,
                'origin_country' => 'India',
                'is_active' => true,
            ],
            [
                'name' => 'Alishaan',
                'description' => 'Beras premium dengan kualitas terjamin dan cita rasa yang istimewa.',
                'price' => 200000,
                'image' => 'beras6.jpg',
                'stock' => 30,
                'category' => 'Beras Premium',
                'weight' => 25.0,
                'origin_country' => 'India',
                'is_active' => true,
            ],
            [
                'name' => 'Shukriya Premium',
                'description' => 'Varian premium dari Shukriya dengan kualitas super dan kemasan eksklusif.',
                'price' => 220000,
                'image' => 'beras7.jpg',
                'stock' => 25,
                'category' => 'Beras Premium',
                'weight' => 25.0,
                'origin_country' => 'India',
                'is_active' => true,
            ],
            [
                'name' => 'Aura Premium',
                'description' => 'Beras Aura varian premium dengan kualitas terbaik dan kemasan mewah.',
                'price' => 255000,
                'image' => 'beras8.jpg',
                'stock' => 20,
                'category' => 'Beras Premium',
                'weight' => 25.0,
                'origin_country' => 'Thailand',
                'is_active' => true,
            ],
            [
                'name' => 'India Saalam',
                'description' => 'Beras basmati India dengan aroma yang khas dan kualitas export quality.',
                'price' => 255000,
                'image' => 'beras9.jpg',
                'stock' => 15,
                'category' => 'Beras Premium',
                'weight' => 25.0,
                'origin_country' => 'India',
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
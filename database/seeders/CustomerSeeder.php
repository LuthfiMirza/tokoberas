<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = [
            [
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@gmail.com',
                'phone' => '081234567890',
                'address' => 'Jl. Merdeka No. 123, Jakarta Pusat, DKI Jakarta',
                'firebase_uid' => null,
            ],
            [
                'name' => 'Siti Nurhaliza',
                'email' => 'siti.nurhaliza@gmail.com',
                'phone' => '081234567891',
                'address' => 'Jl. Sudirman No. 456, Jakarta Selatan, DKI Jakarta',
                'firebase_uid' => null,
            ],
            [
                'name' => 'Ahmad Wijaya',
                'email' => 'ahmad.wijaya@gmail.com',
                'phone' => '081234567892',
                'address' => 'Jl. Gatot Subroto No. 789, Jakarta Barat, DKI Jakarta',
                'firebase_uid' => null,
            ],
            [
                'name' => 'Dewi Sartika',
                'email' => 'dewi.sartika@gmail.com',
                'phone' => '081234567893',
                'address' => 'Jl. Thamrin No. 321, Jakarta Utara, DKI Jakarta',
                'firebase_uid' => null,
            ],
            [
                'name' => 'Rudi Hermawan',
                'email' => 'rudi.hermawan@gmail.com',
                'phone' => '081234567894',
                'address' => 'Jl. Kuningan No. 654, Jakarta Timur, DKI Jakarta',
                'firebase_uid' => null,
            ],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}
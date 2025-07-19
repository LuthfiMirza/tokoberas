<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\Customer;
use App\Models\Product;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = Customer::all();
        $products = Product::all();

        if ($customers->isEmpty() || $products->isEmpty()) {
            $this->command->warn('Please run CustomerSeeder and ProductSeeder first!');
            return;
        }

        $transactions = [
            [
                'customer_id' => 1,
                'product_id' => 1,
                'quantity' => 2,
                'status' => 'delivered',
                'payment_status' => 'paid',
                'payment_method' => 'Transfer Bank',
                'shipping_address' => 'Jl. Merdeka No. 123, Jakarta Pusat, DKI Jakarta',
                'tracking_number' => 'JNE123456789',
                'notes' => 'Pengiriman reguler',
                'order_date' => Carbon::now()->subDays(10),
                'shipped_date' => Carbon::now()->subDays(8),
                'delivered_date' => Carbon::now()->subDays(6),
            ],
            [
                'customer_id' => 2,
                'product_id' => 3,
                'quantity' => 1,
                'status' => 'shipped',
                'payment_status' => 'paid',
                'payment_method' => 'E-Wallet',
                'shipping_address' => 'Jl. Sudirman No. 456, Jakarta Selatan, DKI Jakarta',
                'tracking_number' => 'TIKI987654321',
                'notes' => 'Pengiriman express',
                'order_date' => Carbon::now()->subDays(5),
                'shipped_date' => Carbon::now()->subDays(3),
                'delivered_date' => null,
            ],
            [
                'customer_id' => 3,
                'product_id' => 5,
                'quantity' => 3,
                'status' => 'processing',
                'payment_status' => 'paid',
                'payment_method' => 'COD',
                'shipping_address' => 'Jl. Gatot Subroto No. 789, Jakarta Barat, DKI Jakarta',
                'tracking_number' => null,
                'notes' => 'Bayar di tempat',
                'order_date' => Carbon::now()->subDays(3),
                'shipped_date' => null,
                'delivered_date' => null,
            ],
            [
                'customer_id' => 4,
                'product_id' => 2,
                'quantity' => 1,
                'status' => 'confirmed',
                'payment_status' => 'paid',
                'payment_method' => 'Transfer Bank',
                'shipping_address' => 'Jl. Thamrin No. 321, Jakarta Utara, DKI Jakarta',
                'tracking_number' => null,
                'notes' => 'Pesanan sudah dikonfirmasi',
                'order_date' => Carbon::now()->subDays(2),
                'shipped_date' => null,
                'delivered_date' => null,
            ],
            [
                'customer_id' => 5,
                'product_id' => 4,
                'quantity' => 2,
                'status' => 'pending',
                'payment_status' => 'pending',
                'payment_method' => null,
                'shipping_address' => 'Jl. Kuningan No. 654, Jakarta Timur, DKI Jakarta',
                'tracking_number' => null,
                'notes' => 'Menunggu pembayaran',
                'order_date' => Carbon::now()->subDays(1),
                'shipped_date' => null,
                'delivered_date' => null,
            ],
            [
                'customer_id' => 1,
                'product_id' => 6,
                'quantity' => 1,
                'status' => 'cancelled',
                'payment_status' => 'refunded',
                'payment_method' => 'Transfer Bank',
                'shipping_address' => 'Jl. Merdeka No. 123, Jakarta Pusat, DKI Jakarta',
                'tracking_number' => null,
                'notes' => 'Dibatalkan atas permintaan pelanggan',
                'order_date' => Carbon::now()->subDays(7),
                'shipped_date' => null,
                'delivered_date' => null,
            ],
        ];

        foreach ($transactions as $transactionData) {
            $product = Product::find($transactionData['product_id']);
            $unitPrice = $product->price;
            $totalAmount = $unitPrice * $transactionData['quantity'];

            Transaction::create(array_merge($transactionData, [
                'unit_price' => $unitPrice,
                'total_amount' => $totalAmount,
            ]));
        }
    }
}
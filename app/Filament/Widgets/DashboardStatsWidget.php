<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Transaction;

class DashboardStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $totalProducts = Product::count();
        $activeProducts = Product::where('is_active', true)->count();
        $totalCustomers = Customer::count();
        $totalTransactions = Transaction::count();
        $pendingTransactions = Transaction::where('status', 'pending')->count();
        $totalRevenue = Transaction::where('payment_status', 'paid')->sum('total_amount');
        $lowStockProducts = Product::where('stock', '<=', 10)->count();

        return [
            Stat::make('Total Produk', $totalProducts)
                ->description($activeProducts . ' produk aktif')
                ->descriptionIcon('heroicon-m-cube')
                ->color('success'),

            Stat::make('Total Pelanggan', $totalCustomers)
                ->description('Pelanggan terdaftar')
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),

            Stat::make('Total Transaksi', $totalTransactions)
                ->description($pendingTransactions . ' menunggu konfirmasi')
                ->descriptionIcon('heroicon-m-shopping-cart')
                ->color('warning'),

            Stat::make('Total Pendapatan', 'Rp ' . number_format($totalRevenue, 0, ',', '.'))
                ->description('Dari transaksi yang sudah lunas')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),

            Stat::make('Stok Rendah', $lowStockProducts)
                ->description('Produk dengan stok ≤ 10')
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->color($lowStockProducts > 0 ? 'danger' : 'success'),
        ];
    }
}
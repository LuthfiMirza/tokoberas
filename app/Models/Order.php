<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'customer_name',
        'customer_email',
        'customer_phone',
        'shipping_address',
        'shipping_city',
        'shipping_postal_code',
        'shipping_province',
        'payment_method',
        'total_amount',
        'status',
        'order_notes',
    ];

    protected $casts = [
        'total_amount' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function paymentProofs()
    {
        return $this->hasMany(PaymentProof::class);
    }

    public function getStatusLabelAttribute()
    {
        $statuses = [
            'pending_payment' => 'Menunggu Pembayaran',
            'payment_uploaded' => 'Bukti Pembayaran Dikirim',
            'payment_verified' => 'Pembayaran Terverifikasi',
            'processing' => 'Sedang Diproses',
            'shipped' => 'Dikirim',
            'delivered' => 'Diterima',
            'cancelled' => 'Dibatalkan',
        ];

        return $statuses[$this->status] ?? $this->status;
    }

    public function getStatusColorAttribute()
    {
        $colors = [
            'pending_payment' => '#ffc107',
            'payment_uploaded' => '#17a2b8',
            'payment_verified' => '#28a745',
            'processing' => '#007bff',
            'shipped' => '#6f42c1',
            'delivered' => '#28a745',
            'cancelled' => '#dc3545',
        ];

        return $colors[$this->status] ?? '#6c757d';
    }
}
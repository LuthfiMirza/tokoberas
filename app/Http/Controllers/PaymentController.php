<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\PaymentProof;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function confirmation(Order $order)
    {
        return view('payment.confirmation', compact('order'));
    }
    
    public function uploadProof(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'payment_proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120', // 5MB
            'sender_bank' => 'required|string|max:255',
            'sender_name' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);
        
        $order = Order::findOrFail($request->order_id);
        
        // Store the uploaded file
        $file = $request->file('payment_proof');
        $fileName = time() . '_' . $order->order_number . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('payment_proofs', $fileName, 'public');
        
        // Save payment proof record
        PaymentProof::create([
            'order_id' => $order->id,
            'file_path' => $filePath,
            'sender_bank' => $request->sender_bank,
            'sender_name' => $request->sender_name,
            'notes' => $request->notes,
            'status' => 'pending_verification',
        ]);
        
        // Update order status
        $order->update(['status' => 'payment_uploaded']);
        
        // Send WhatsApp notification (you can implement this)
        $this->sendWhatsAppNotification($order);
        
        return response()->json([
            'success' => true,
            'message' => 'Bukti pembayaran berhasil dikirim. Tim kami akan segera memverifikasi pembayaran Anda.'
        ]);
    }
    
    public function success(Order $order)
    {
        return view('payment.success', compact('order'));
    }
    
    private function sendWhatsAppNotification($order)
    {
        // Here you can implement WhatsApp API integration
        // For now, we'll just log the notification
        \Log::info("WhatsApp notification for order: {$order->order_number}");
        
        // You can use services like:
        // - WhatsApp Business API
        // - Twilio WhatsApp API
        // - Or other WhatsApp gateway services
    }
}
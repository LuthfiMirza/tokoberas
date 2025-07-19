<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = [
            ['name' => 'Shukriya', 'price' => 200000, 'image' => 'beras1.jpg'],
            ['name' => 'Aura', 'price' => 195000, 'image' => 'beras2.jpg'],
            ['name' => 'JabalNur', 'price' => 170000, 'image' => 'beras3.jpg'],
            ['name' => 'IndiaFeast', 'price' => 200000, 'image' => 'beras4.jpg'],
            ['name' => 'DaawatSella', 'price' => 195000, 'image' => 'beras5.jpg'],
            ['name' => 'Alishaan', 'price' => 200000, 'image' => 'beras6.jpg'],
            ['name' => 'Shukriya2', 'price' => 220000, 'image' => 'beras7.jpg'],
            ['name' => 'Aura Premium', 'price' => 255000, 'image' => 'beras8.jpg'],
            ['name' => 'India Saalam', 'price' => 255000, 'image' => 'beras9.jpg'],
        ];

        return view('home', compact('products'));
    }

    public function dashboard()
    {
        return view('user.dashboard');
    }
}
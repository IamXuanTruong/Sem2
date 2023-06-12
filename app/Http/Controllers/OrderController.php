<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function product()
    {
        $checkouts = Checkout::all();
        return view('order', ['orders' => $checkouts]);
    }
    
}

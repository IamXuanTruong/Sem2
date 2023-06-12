<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Apply auth middleware to the controller
    }
    public function index()
    {
        return view('order');
    }
    public function checkout()
    {
        return view('checkout');
    }
}

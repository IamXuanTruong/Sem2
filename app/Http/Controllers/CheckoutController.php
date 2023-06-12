<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function submitdl(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'required' => 'required',
        ]);

        Checkout::create($validatedData);
        return redirect()->route('order')->with('CheckoutData', $validatedData);
    }
    public function getAllContacts()
    {
        $checkouts = Checkout::all();

        return view('order')->with('checkouts', $checkouts);
    }
}

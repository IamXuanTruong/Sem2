<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);
        session(['contactData' => [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ]]);
        Contact::create($validatedData);
        return redirect()->route('Lienhe')->with('contactData', $validatedData);
    }
    public function getAllContacts()
    {
        $contacts = Contact::all();

        return view('Lienhe')->with('contacts', $contacts);
    }
}

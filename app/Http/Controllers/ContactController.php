<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('contact.index');
    }

    public function store(Request $request){
        $request->validate([
            'pharmacy_name' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'province' => 'required',
            'phone' => 'required',
            'nif_1' => 'required|digits:5',
            'nif_2' => 'nullable|digits:5',
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'terms' => 'required|accepted',
        ]);


        return $request->all();


        /* return redirect()->route('contact.index')->with('message', 'Thanks for your message. We\'ll be in touch.'); */
    }
}

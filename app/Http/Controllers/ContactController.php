<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
        public function contacts(){
        return view('guest.contacts.index');
    }

        public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|min:4|max:50',
            'email' => 'required|email',
            'messagae' => 'required|min:50|max|500'

        ]);

        $contact = Contact::create($validated);
        // Mail::to('admin.example.com')->send(new )

        // return (new ContactFormMail($validated))->render();

        

    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use App\Mail\ContactFormMailable;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

        public function contacts(){

            
         return view('guest.contacts.index');
    }

        public function store(Request $request){

        $validated = $request->validate([
            'name' => 'required|min:4|max:50',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required|min:50|max:500'

        ]);

            //  ddd($request->all());
            // $mail = new Contact();
            // $mail->name = $request->name;
            // $mail->email = $request->email;
            // $mail->message = $request->message;
            // $mail->save();

            $mail = Contact::create($validated);
            Mail::to('admin@admin.com')->send(new ContactMail($mail));




        // ddd($validated);
        // $contact = Contact::create($validated);
        // return (new ContactFormMail($validated))->render();
        // Mail::to('giovanni@gmail.com')->send(new ContactFormMailable($validated));
        return redirect()->back()->with('message', 'Message sent successfully');



    }
}

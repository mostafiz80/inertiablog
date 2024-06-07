<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'textarea' => 'required|string',
        ]);

        // Save form data to the database
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->textarea,
        ]);

        // Send email
        Mail::to(config('mail.from.address'))->send(new ContactFormMail($request->all()));

        // Return a response, maybe a success message
        return response()->json(['message' => 'Form submitted successfully']);
    }
}

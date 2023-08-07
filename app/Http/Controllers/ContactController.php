<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactController extends Controller
{
    public function index(){
        return  view('contact');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|max:255',
            'message' => 'required',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);
        
        Http::post(config('app.contact'), [
            'content' => "**Name**: {$request->name}\n**Email**: {$request->email}\n**Subject**: {$request->subject}\n**Message**: {$request->message}\n==================\n"
        ]);
        
        return back()->with('success', 'Contact message sent! We will contact you shortly');
    }
}

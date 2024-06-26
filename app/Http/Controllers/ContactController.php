<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('dashboard.contacts', [
            'contacts' => Contact::latest()->get()
        ]);
    }

    public function delete(Contact $contact){
        $contact->delete();
        return back();
    }
}

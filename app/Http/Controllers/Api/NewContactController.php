<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewContactController extends Controller
{
    public function store(Request $request){

        $data = $request->all();

        $newContactData = Contact::create($data);

        Mail::to('info@boolfolio.com')->send(new NewContact($newContactData));

        return response()->json([
            'sended' => true,
            'result' => $data
        ]);
    }
}

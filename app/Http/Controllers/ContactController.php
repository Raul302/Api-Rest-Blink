<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index(){
        $contacts = Contact::all();

        return response()->json($contacts,200);
    }

    public function show($id){
        $contact = Contact::find($id);

        return response()->json($contact,200);
    }

    public function save(Request $request){
        $contact = Contact::create($request->all());
        return response()->json($contact,201);
    }

    public function delete($id){
        $contact = Contact::find($id);
        $contact->delete();

        return response()->json(null, 204);
    }
}

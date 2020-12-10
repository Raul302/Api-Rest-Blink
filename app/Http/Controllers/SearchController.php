<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function defaultSelectBio(Request $request){
        // get mainUser
        $mainId = $request->get('mainID');
        $mainUser = User::find($mainId);

        $contactId = $request->get('contactID');
        $contact = Contact::find($contactId);
        $merged = $mainUser->merge($contact);
        return response()->json($merged,200);
    }
}

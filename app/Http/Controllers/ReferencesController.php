<?php

namespace App\Http\Controllers;

use App\Models\Contact_reference;
use App\Models\References;
use Illuminate\Http\Request;

class ReferencesController extends Controller
{
    public function index(){
        $references = References::all();

        return response()->json($references,200);
    }

    public function show($id){
        $references = References::find($id);

        return response()->json($references,200);
    }

    public function save(Request $request){
        $references = References::create($request->all());
        $obj['id_contact'] = $references->id;
        $obj['id_reference'] = $request->get('idContact');
        $contactReference = Contact_reference::create($obj);
        return response()->json($contactReference,201);
    }

    public function delete($id){
        $references = References::find($id);
        $contactReference = Contact_reference::whereIn('id_reference',$id);
        $contactReference->delete();
        $references->delete();

        return response()->json(null, 204);
    }
}

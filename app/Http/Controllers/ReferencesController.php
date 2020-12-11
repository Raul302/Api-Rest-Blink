<?php

namespace App\Http\Controllers;

use App\Models\Contact_reference;
use App\Models\reference_address;
use App\Models\reference_email;
use App\Models\reference_phone;
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
        $obj['id_contact'] = $request->get('idContact');
        $obj['id_reference'] = $references->id;
        $contactReference = Contact_reference::create($obj);
          if($request->get('phone')){
            $array = [];
            $array['phone'] = $request->get('phone');
            $array['id_reference'] = $references->id;
            $phone_reference = reference_phone::create($array);
        }
        if($request->get('city')){
            $address = [];
            $address['id_reference'] = $references->id;
            $address['city'] = $request->get('city');
            $address['state'] = $request->get('state');
            $reference_address = reference_address::create($address);
        }
         if($request->get('email')){
            $array = [];
            $array['email'] = $request->get('email');
            $array['id_reference'] = $references->id;
            $email_reference = reference_email::create($array);
        }
        return response()->json($contactReference,201);
    }

    public function delete($id){
        $references = References::find($id);
        $contactReference = Contact_reference::whereIn('id_reference',$id);
        $contactReference->delete();
        $references->delete();

        return response()->json(null, 204);
    }
    
    public function cxref(Request $request){
        $contactID = $request->get('id');
        $references = null;
        $contactReference = Contact_reference::select(
            'id_reference'
            )->where('id_contact',$contactID);
            
            if($contactReference){
               $contactReference =  $contactReference->get()->toArray();
            $references = References::select('*')->whereIn('id',$contactReference)
            ->with('reference_address')
        ->with('reference_emails')
        ->with('reference_phones')
            ->get();
            }
                    return response()->json($references, 200);
    }
    public function update(Request $request){
        $reference = References::find($request->get('id'));
        $input = $request->all();
        if($reference){
            $reference->update($input);
        }
        if($request->get('direction')){
            $directionDelete = reference_address::where('id_reference','=',$reference->id);
            if($directionDelete){
                $directionDelete->delete();
            }
            $array = $request->get('direction');
            foreach($array as $a) {
            $a['id_reference'] = $reference->id;
            $direction_contact = reference_address::create($a);
        }
        if($request->get('phone')){
            $phoneDeleted = reference_phone::where('id_Reference','=',$reference->id);
            if($phoneDeleted){
                $phoneDeleted->delete();
            }
            $array = $request->get('phone');
            foreach($array as $a) {
            $a['id_reference'] = $reference->id;
            $phone_contact = reference_phone::create($a);
        }
        }
         if($request->get('email')){
            $emailDeleted = reference_email::where('id_reference','=',$reference->id);
            if($emailDeleted){
                $emailDeleted->delete();
            }
            $array = $request->get('email');
            foreach($array as $a) {
            $a['id_contact'] = $reference->id;
            $email_contact = reference_email::create($a);
        }
        }
            
        }
        return response()->json($reference,200);
        
    }
}

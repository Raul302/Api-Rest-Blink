<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\contact_direction;
use App\Models\contact_email;
use App\Models\contact_phone;
use App\Models\Program_contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //
    public function index(){
        $contacts = Contact
        ::select('contacts.*',
        'pc.id_contact',
        'pc.id_program',
        'pc.year'
        )
        ->with('contacts_references')
         ->leftJoin('program_contacts as pc', 'contacts.id', '=', 'pc.id_contact')
         ->groupBy('contacts.id')
            ->get();

        return response()->json($contacts,200);
    }

    public function show($id){
        $contact = Contact::where('id',$id)
        ->with('contacts_direction')
        ->with('contacts_emails')
        ->with('contacts_phones')
        ->get();

        return response()->json($contact,200);
    }

    public function save(Request $request){
        $data = $request->all();
        unset($data['email']);
        unset($data['phone']);
        $contact = Contact::create($data);
        
        if($request->get('city')){
            $address = [];
            $address['id_contact'] = $contact->id;
            $address['city'] = $request->get('city');
            $address['state'] = $request->get('state');
            $contact_direction = contact_direction::create($address);
        }
        
        if($contact->id){
            $data['id_program'] = $request->get('program');
            $data['year'] = $request->get('year');
            $data['id_contact'] = $contact->id;
            $program = Program_contact::create($data);
             
        if($request->get('phone')){
            $array = [];
            $array['phone'] = $request->get('phone');
            $array['id_contact'] = $contact->id;
            $phone_contact = contact_phone::create($array);
        }
         if($request->get('email')){
            $array = [];
            $array['email'] = $request->get('email');
            $array['id_contact'] = $contact->id;
            $email_contact = contact_email::create($array);
        }
            
    }
        
        return response()->json($contact,201);
    }
     
    public function update(Request $request){

        $contact = Contact::find($request->get('id'));
        $input = $request->all();
        unset($input['email']);
        unset($input['phone']);
        if($contact){
            $contact->update($input);
        }
        
        if($request->get('direction')){
            $directionDelete = contact_direction::where('id_contact','=',$contact->id);
            if($directionDelete){
                $directionDelete->delete();
            }
            $array = $request->get('direction');
            foreach($array as $a) {
            $a['id_contact'] = $contact->id;
            $direction_contact = contact_direction::create($a);
        }
        if($request->get('phone')){
            $phoneDeleted = contact_phone::where('id_contact','=',$contact->id);
            if($phoneDeleted){
                $phoneDeleted->delete();
            }
            $array = $request->get('phone');
            foreach($array as $a) {
            $a['id_contact'] = $contact->id;
            $phone_contact = contact_phone::create($a);
        }
        }
         if($request->get('email')){
            $emailDeleted = contact_email::where('id_contact','=',$contact->id);
            if($emailDeleted){
                $emailDeleted->delete();
            }
            $array = $request->get('email');
            foreach($array as $a) {
            $a['id_contact'] = $contact->id;
            $email_contact = contact_email::create($a);
        }
        }
            
        }
        return response()->json($contact,200);
    }
    public function delete($id){
        $contact = Contact::find($id);
        $contact->delete();

        return response()->json(null, 204);
    }
}

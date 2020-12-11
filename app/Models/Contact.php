<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'father_lastname',
        'mother_lastname',
        'birthday',
        'schoool',
        'cicly',
        'grade',
        'email',
        'phone',
        'state',
        'city',
     ];
     
     public function contacts_direction (){
             return $this->hasMany('App\Models\contact_direction','id_contact', 'id');
     }
      public function contacts_emails (){
             return $this->hasMany('App\Models\contact_email','id_contact', 'id');
      }
              public function contacts_phones (){
             return $this->hasMany('App\Models\contact_phone','id_contact', 'id');
     }
     
        public function contacts_references (){
        return $this->hasMany('App\Models\Contact_reference','id_contact', 'id')->join('references','references.id','=','contact_references.id_reference');
     }
}

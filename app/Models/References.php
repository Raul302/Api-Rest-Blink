<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class References extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_ref',
        'name_ref',
        'father_lastname',
        'mother_lastname',
        'email',
        'phone'
    ];
    
     public function reference_address (){
             return $this->hasMany('App\Models\reference_address','id_reference', 'id');
     }
      public function reference_emails (){
             return $this->hasMany('App\Models\reference_email','id_reference', 'id');
      }
              public function reference_phones (){
             return $this->hasMany('App\Models\reference_phone','id_reference', 'id');
     }
}

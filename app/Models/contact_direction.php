<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact_direction extends Model
{
    use HasFactory;
     protected $fillable = [
       'id_contact',
       'street',
       'number',
       'cp',
       'city',
       'state',
       'typeAddress',
     ];
}

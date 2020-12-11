<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reference_address extends Model
{
    use HasFactory;
     protected $fillable = [
       'id_reference',
       'street',
       'number',
       'cp',
       'city',
       'state',
       'typeAddress',
     ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reference_phone extends Model
{
    use HasFactory;
     protected $fillable = [
       'id_reference',
       'phone',
       'typePhone',
     ];
}

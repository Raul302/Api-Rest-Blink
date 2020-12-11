<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reference_email extends Model
{
    use HasFactory;
     protected $fillable = [
       'id_reference',
       'email',
       'typeEmail',
     ];
}

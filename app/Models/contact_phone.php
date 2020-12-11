<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact_phone extends Model
{
    use HasFactory;
    protected $fillable = [
       'id_contact',
       'phone',
       'typePhone',
     ];
}

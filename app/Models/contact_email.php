<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact_email extends Model
{
    use HasFactory;
    protected $fillable = [
       'id_contact',
       'email',
       'typeEmail',
     ];
}

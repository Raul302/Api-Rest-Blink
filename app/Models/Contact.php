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
        'email',
        'phone',
        'state',
        'city',
     ];
}

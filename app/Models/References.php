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
}

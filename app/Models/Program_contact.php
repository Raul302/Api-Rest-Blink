<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program_contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_contact',
        'id_program',
        'year',
    ];
}

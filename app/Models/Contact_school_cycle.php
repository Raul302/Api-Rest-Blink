<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_school_cycle extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_contact',
        'grade',
        'year_cycle'
     ];
}

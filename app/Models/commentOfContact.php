<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commentOfContact extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_mainContact',
        'date',
        'subject',
        'text',
    ];
}

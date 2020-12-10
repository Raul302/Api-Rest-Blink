<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class participantsOfComment extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_comment',
        'id_participant',
        'email_participant',
    ];
}

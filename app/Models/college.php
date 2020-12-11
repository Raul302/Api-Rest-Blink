<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class college extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'country',
        'website',
        'description',
        'start_boarding_grade',
        'end_boarding_grade',
        'start_day_grade',
        'end_day_grade',
        'total_boarding_grade',
        'total_international_grade',
        'total_day_students',
        'total_students_in_school',
        'location'
        ];
}

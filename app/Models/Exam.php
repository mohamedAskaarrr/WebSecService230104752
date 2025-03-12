<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'date',
        'time',
        'total_marks|numeric',
        'passing_marks|numeric',

    ];
}

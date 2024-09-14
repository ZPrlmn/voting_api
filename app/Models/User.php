<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'student_id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'student_id', 'first_name', 'last_name', 'year', 'course', 'department', 'has_voted',
    ];
    protected $casts = [
        'has_voted' => 'boolean',
    ];
}

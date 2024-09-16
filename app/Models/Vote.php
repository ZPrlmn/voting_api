<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $table = 'voted';  // Use the correct table name
    protected $fillable = ['student_id', 'candidates_id'];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'student_id');
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidates_id', 'id');
    }
}

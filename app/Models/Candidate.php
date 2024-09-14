<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $table = 'candidates';
    protected $fillable = ['student_id', 'position_id', 'votes'];
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'student_id');
    }
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }
}

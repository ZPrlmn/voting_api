<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voted extends Model
{
    use HasFactory;
    protected $table = 'voted';
    protected $fillable = ['student_id', 'candidates_id', 'position_id'];
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id', 'student_id');
    }
    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidates_id');
    }
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }
}

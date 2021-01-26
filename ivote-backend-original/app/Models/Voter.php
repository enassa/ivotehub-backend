<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    use HasFactory;
    protected $table = 'voters';
    protected $fillable = ['row_count', 'index_number', 'full_name', 'gender', 'programme', 'grade', 'raw_score', 'school_attended', 'rstatus', 'track_number', 'vote_status'];

}

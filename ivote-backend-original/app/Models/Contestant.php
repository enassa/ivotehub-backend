<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contestant extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'contestants';
    protected $fillable = ['name', 'house', 'current_class', 'gender', 'programme', 'image_url', 'group', 'group_name'];
}

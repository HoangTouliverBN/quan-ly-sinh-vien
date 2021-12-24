<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classroom extends Model
{
    use HasFactory;
    protected $table = "classroom";
    protected $primaryKey = "classCode";
    public $incrementing = false;
    protected $fillable = ['subjectCodeClass', 'idTeacher', 'classCode','name'];
}

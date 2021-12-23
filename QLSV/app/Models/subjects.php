<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subjects extends Model
{
    use HasFactory;
    protected $table = "subjects";
    public $incrementing = false;
    protected $primaryKey = "subjectCode";
    protected $fillable = ['subjectCode','subject'];
}

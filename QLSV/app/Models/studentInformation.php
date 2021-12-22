<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentInformation extends Model
{
    use HasFactory;
    protected $table = "students_information";
    protected $primaryKey = "studentCode";
    public $incrementing = false;
    protected $fillable = ['name', 'studentCode', 'dob', 'gender'];
}

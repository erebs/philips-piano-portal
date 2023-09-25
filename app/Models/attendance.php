<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    use HasFactory;

    protected $table='attendances';
    protected $guarded=[];

      public function GetStudent()
    {
        return $this->belongsTo(student::class, 'student_id', 'id');
    }

    public function GetTeacher()
    {
        return $this->belongsTo(student::class, 'added_by', 'id');
    }

     public function GetTeacher1()
    {
        return $this->belongsTo(student::class, 'updated_by', 'id');
    }

    
}

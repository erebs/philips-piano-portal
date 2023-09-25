<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class credit_class extends Model
{
    use HasFactory;

    protected $table='credit_classes';
    protected $guarded=[];

     public function GetStudent()
    {
        return $this->belongsTo(student::class, 'student_id', 'id');
    }

     public function GetSlote()
    {
        return $this->belongsTo(slote::class, 'slote', 'id');
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

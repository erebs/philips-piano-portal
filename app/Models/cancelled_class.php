<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cancelled_class extends Model
{
    use HasFactory;

    protected $table='cancelled_classes';
    protected $guarded=[];

     public function GetStudent()
    {
        return $this->belongsTo(student::class, 'student_id', 'id');
    }
}

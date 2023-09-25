<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class refund_request extends Model
{
    use HasFactory;
    protected $table='refund_requests';
    protected $guarded=[];

       public function GetStudent()
    {
        return $this->belongsTo(student::class, 'student_id', 'id');
    }
}

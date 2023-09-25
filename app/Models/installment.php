<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class installment extends Model
{
    use HasFactory;
    protected $table='installments';
    protected $guarded=[];

        public function GetStudent()
    {
        return $this->belongsTo(student::class, 'student_id', 'id');
    }

    public function GetPlan()
    {
        return $this->belongsTo(plan::class, 'plan_id', 'id');
    }
}

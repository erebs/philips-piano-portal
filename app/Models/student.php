<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class student extends Authenticatable
{
    use HasFactory;
    use HasApiTokens;
     protected $table='students';
    protected $guarded=[];

       public function GetBranch()
    {
        return $this->belongsTo(branch::class, 'branch', 'id');
    }

     public function GetSlote()
    {
        return $this->belongsTo(slote::class, 'slote', 'id');
    }

    public function GetPlan()
    {
        return $this->belongsTo(plan::class, 'plan', 'id');
    }
}

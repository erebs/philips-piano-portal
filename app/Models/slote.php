<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slote extends Model
{
    use HasFactory;
    protected $table='slotes';
    protected $guarded=[];

    protected $hidden=['created_at','updated_at'];
}

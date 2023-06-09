<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class outlet extends Model
{
    use HasFactory,SoftDeletes;
    public function route(){
        return $this->belongsTo(route::class,'route_name','id');
    }
}

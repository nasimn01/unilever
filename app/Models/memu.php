<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class memu extends Model
{
    use HasFactory,SoftDeletes;
    public function outlet(){
        return $this->belongsTo(outlet::class,'outlet_id','id');
    }
}

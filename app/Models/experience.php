<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class experience extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function status (){
        return $this->belongsTo(Work_status::class, 'status_id', 'id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;


class Queue extends Model
{
    use SoftDeletes,CascadeSoftDeletes;

    protected $table = 'queues';

    protected $dates = ['deleted_at'];

    
    public function patient(){
        return $this->belongsTo(Patient::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Prescription extends Model
{

    use SoftDeletes,CascadeSoftDeletes;

    protected $table = 'prescriptions';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'drug',
        'note',
        'quantity',
        'refill',
    ];


    public function patient(){
        return $this->belongsTo(Patient::class);
    }
}

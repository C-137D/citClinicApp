<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Complaint extends Model
{
    use SoftDeletes,CascadeSoftDeletes;


    protected $table = 'complaints';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'bP',
        'pR',
        'rR',
        'temp',
        's',
        'o',
        'a',
        'p',
    ];


    public function patient(){
        return $this->belongsTo(Patient::class);
    }
}

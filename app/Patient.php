<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Patient extends Model
{
    use SoftDeletes,CascadeSoftDeletes;

    protected $table = 'patients';

    protected $cascadeDeletes = ['prescription'];

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'studentId',
        'lName',
        'fName',
        'mName',
        'course',
        'year',
        'sex',
        'bod',
        'height',
        'weight',
        'age',
        'pic',
        'bloodType',
        'status',
        // address
        'address',
        'mobileNo',
        // in case of emergency
        'contactPerson',
        'relation',
        'addressEm',
        'landLine'
    ];




    public static function boot()
    {
        parent::boot();



        // cause a restore of a folder to cascade
        // to children so they are also restored
        static::restoring(function($patient) {
            $patient->prescription()->withTrashed()->get()
                ->each(function($prescription) {
                    $prescription->restore();
                });
            $patient->complaint()->withTrashed()->get()
            ->each(function($complaint) {
                $complaint->restore();
            });
        });
    }












    public function prescription()
    {
        return $this->hasMany(Prescription::class);
    }
    public function queue()
    {
        return $this->hasMany(Queue::class);
    }
    public function complaint()
    {
        return $this->hasMany(Complaint::class);
    }
}

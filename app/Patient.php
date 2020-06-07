<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{    

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'date_of_birth', 'old', 'address', 'status'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password',
    // ];

    public function assessment()
    {
        return $this->hasMany('App\Assessment');
    }

    public function treatment()
    {
        return $this->hasMany('App\TreatmentLog');
    }
}

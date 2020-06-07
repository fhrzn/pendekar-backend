<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TreatmentImplementLog extends Model
{    

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'treatment_log_id',
        'action',
        'action_date',
        'action_time'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password',
    // ];

    public function treatmentLog()
    {
        return $this->belongsTo('App\TreatmentLog');
    }
}

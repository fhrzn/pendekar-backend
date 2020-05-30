<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TreatmentLog extends Model
{
    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id',
        'treatment_date',
        'treatment_time',
        'result_subjective',
        'result_objective',
        'result_blood_pressure',
        'result_circulation_pulse',
        'result_breath_rr',
        'result_breath_spo2',
        'result_temperature',
        'result_gcs',
        'result_presence_of_mind',
        'result_urine_total',
        'result_urine_color',
        'result_objective_complaint',
        'result_subjective_complaint',
        'result_assessment_problem',
        'result_intervention',
        'assessments_id',
        'patients_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password',
    // ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function assessment()
    {
        return $this->belongsTo('App\Assessment');
    }

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}

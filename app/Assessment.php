<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{    

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'date_enter_room',
        'time_enter_room',
        'time_assessment',
        'medical_diagnose',
        'reason',
        'subjective_complaint',
        'objective_complaint',
        'illness_history',
        'allergies_history',
        'been_treated',
        'medicine_from_home',
        'from_malaria_region',
        'difficulty_breathing',
        'breath_rr',
        'breath_spo2',
        'breath_using_o2',
        'breath_o2_liter_per_minute',
        'blood_pressure',
        'circulation_pulse',
        'circulation_perfusion',
        'heart_rhythm',
        'num_gcs',
        'type_presence_of_mind',
        'temperature',
        'urination_problem',
        'catheter',
        'catheter_num',
        'catheter_install_date',
        'urine_total',
        'urine_color',
        'defecation_problem',
        'appetite',
        'is_lose_weight_in_three_months',
        'is_reduced_food_intake',
        'is_severe_illness',
        'skin_condition',
        'deformity',
        'muscle_strength',
        'fracture',
        'decubitus',
        'muskuloskeletal_others',
        'any_suicide_idea',
        'any_suicide_trial',
        'any_violence_experience',
        'doing_violence_experience',
        'narcotics_list',
        'any_abandoned_self',
        'family_relationship',
        'residence',
        'social_risk',
        'psychologist_condition',
        'religious_activity',
        'job',
        'care_giver',
        'mobilization',
        'personal',
        'toileting',
        'dressing',
        'eat_or_drinks',
        'device_usage',
        'functional_trouble',
        'fall_down_history',
        'fall_medical_history',
        'fall_devices',
        'use_infuse',
        'walking_style',
        'mental_status',
        'fall_risk_scores',
        'pain_scale',
        'infection_risk',
        'infection_prevention',
        'education_for',
        'education_needs',
        'more_then_65_olds',
        'restricted_mobilities',
        'continous_treatment',
        'help_for_daily_activities',
        'plannings',
        'hemoglobin_score',
        'leucocytes_score',
        'trombosite_score',
        'hematrocit_score',
        'eritrocit_score',
        'sgot',
        'sgpt',
        'bun',
        'creatinin',
        'natrium_serum',
        'kalium_serum',
        'clorida_serum',
        'hbsag',
        'rapid_test',
        'gda_score',
        'radiology',
        'usg',
        'ekg',
        'others',
        'result_problems_treatment',
        'date_assessment_complete',
        'time_assessment_complete',
        'user_id',
        'result_diagnose_treatment',
        'result_goal_treatment',
        'result_indicator_treatment',
        'result_intervention_treatment'
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

    public function patient()
    {
        return $this->belongsTo('App\Patient');
    }
}

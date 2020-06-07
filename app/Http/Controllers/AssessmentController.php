<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use App\Assessment;
use App\TreatmentLog;

class AssessmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function insert(Request $request)
    {

        $token = json_decode(base64_decode(explode(' ', $request->header('Authorization'))[1]));
        
        $response = Assessment::create([
            'patient_id' => $request->patient_id,
            'date_enter_room' => $request->date_enter_room,
            'time_enter_room' => $request->time_enter_room,
            'time_assessment' => $request->time_assessment,
            'medical_diagnose' => $request->medical_diagnose,
            'reason' => $request->reason,
            'subjective_complaint' => $request->subjective_complaint,
            'objective_complaint' => $request->objective_complaint,
            'illness_history' => $request->illness_history,
            'allergies_history' => $request->allergies_history,
            'been_treated' => $request->been_treated,
            'medicine_from_home' => $request->medicine_from_home,
            'from_malaria_region' => $request->from_malaria_region,
            'difficulty_breathing' => $request->difficulty_breathing,
            'breath_rr' => $request->breath_rr,
            'breath_spo2' => $request->breath_spo2,
            'breath_using_o2' => $request->breath_using_o2,
            'breath_o2_liter_per_minute' => $request->breath_o2_liter_per_minute,
            'blood_pressure' => $request->blood_pressure,
            'circulation_pulse' => $request->circulation_pulse,
            'circulation_perfusion' => $request->circulation_perfusion,
            'heart_rhythm' => $request->heart_rhythm,
            'num_gcs' => $request->num_gcs,
            'type_presence_of_mind' => $request->type_presence_of_mind,
            'temperature' => $request->temperature,
            'urination_problem' => $request->urination_problem,
            'catheter' => $request->catheter,
            'catheter_num' => $request->catheter_num,
            'catheter_install_date' => $request->catheter_install_date,
            'urine_total' => $request->urine_total,
            'urine_color' => $request->urine_color,
            'defecation_problem' => $request->defecation_problem,
            'appetite' => $request->appetite,
            'is_lose_weight_in_three_months' => $request->is_lose_weight_in_three_months,
            'is_reduced_food_intake' => $request->is_reduced_food_intake,
            'is_severe_illness' => $request->is_severe_illness,
            'skin_condition' => $request->skin_condition,
            'deformity' => $request->deformity,
            'muscle_strength' => $request->muscle_strength,
            'fracture' => $request->fracture,
            'decubitus' => $request->decubitus,
            'muskuloskeletal_others' => $request->muskuloskeletal_others,
            'any_suicide_idea' => $request->any_suicide_idea,
            'any_suicide_trial' => $request->any_suicide_trial,
            'any_violence_experience' => $request->any_violence_experience,
            'doing_violence_experience' => $request->doing_violence_experience,            
            'narcotics_list' => $request->narcotics_list,
            'any_abandoned_self' => $request->any_abandoned_self,
            'family_relationship' => $request->family_relationship,
            'residence' => $request->residence,
            'social_risk' => $request->social_risk,
            'psychologist_condition' => $request->psychologist_condition,
            'religious_activity' => $request->religious_activity,
            'job' => $request->job,
            'care_giver' => $request->care_giver,
            'mobilization' => $request->mobilization,
            'personal' => $request->personal,
            'toileting' => $request->toileting,
            'dressing' => $request->dressing,
            'eat_or_drinks' => $request->eat_or_drinks,
            'device_usage' => $request->device_usage,
            'functional_trouble' => $request->functional_trouble,
            'fall_down_history' => $request->fall_down_history,
            'fall_medical_history' => $request->fall_medical_history,
            'fall_devices' => $request->fall_devices,
            'use_infuse' => $request->use_infuse,
            'walking_style' => $request->walking_style,
            'mental_status' => $request->mental_status,
            'fall_risk_scores' => $request->fall_risk_scores,
            'pain_scale' => $request->pain_scale,
            'infection_risk' => $request->infection_risk,
            'infection_prevention' => $request->infection_prevention,
            'education_for' => $request->education_for,
            'education_needs' => $request->education_needs,
            'more_then_65_olds' => $request->more_then_65_olds,
            'restricted_mobilities' => $request->restricted_mobilities,
            'continous_treatment' => $request->continous_treatment,
            'help_for_daily_activities' => $request->help_for_daily_activities,
            'plannings' => $request->plannings,
            'hemoglobin_score' => $request->hemoglobin_score,
            'leucocytes_score' => $request->leucocytes_score,
            'trombosite_score' => $request->trombosite_score,
            'hematrocit_score' => $request->hematrocit_score,
            'eritrocit_score' => $request->eritrocit_score,
            'gda_score' => $request->gda_score,
            'radiology' => $request->radiology,
            'usg' => $request->usg,
            'others' => $request->others,
            'result_problems_treatment' => $request->result_problems_treatment,
            'date_assessment_complete' => $request->date_assessment_complete,
            'time_assessment_complete' => $request->time_assessment_complete,
            'user_id' => $token->id,
            'result_diagnose_treatment' => $request->result_diagnose_treatment,
            'result_goal_treatment' => $request->result_goal_treatment,
            'result_indicator_treatment' => $request->result_indicator_treatment,
            'result_intervention_treatment' => $request->result_intervention_treatment
        ]);

        // dd($response->id);

        // TODO : insert ke tabel treatment juga
        $treatment = TreatmentLog::create([
            'user_id' => $token->id,
            'treatment_date' => $request->date_assessment_complete,
            'treatment_time' => $request->time_assessment_complete,
            'result_subjective' => $request->subjective_complaint,
            'result_objective' => $request->objective_complaint,
            'result_blood_pressure' => $request->blood_pressure,
            'result_circulation_pulse' => $request->circulation_pulse,
            'result_breath_rr' => $request->breath_rr,
            'result_breath_spo2' => $request->breath_spo2,
            'result_temperature' => $request->temperature,
            'result_gcs' => $request->num_gcs,
            'result_presence_of_mind' => $request->type_presence_of_mind,
            'result_urine_total' => $request->urine_total,
            'result_urine_color' => $request->urine_color,
            'result_assessment_problem' =>$request->result_problems_treatment,
            'result_intervention' => $request->result_intervention_treatment,
            'assessment_id' => $response->id,
            'patient_id' => $request->patient_id
        ]);

        if ($response) {
            return response()->json([
                'success' => true,
                'message' => 'Assessment added successfully.'
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add assessment.'
            ], 400);
        }
    }

    public function get($id)
    {
        $asssessment = Assessment::find($id);
        
        if ($asssessment) {
            return response()->json([
                'success' => true,
                'message' => 'Assessment found.',                
                'data' => $asssessment->load(['user', 'patient'])
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Assessment not found.'
            ], 404);
        }
    }

    public function getAll()
    {
        $asssessment = Assessment::all();

        if ($asssessment) {
            return response()->json([
                'success' => true,
                'message' => 'Assessment found.',
                'data' => $asssessment->load(['user', 'patient'])
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => ' Assessment not found'
            ], 400);
        }
    }
}

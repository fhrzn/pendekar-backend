<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use App\TreatmentLog;

class TreatmentLogController extends Controller
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
        // dd($request);
        $response = TreatmentLog::create([
            'user_id' => $token->id,
            'treatment_date' => $request->treatment_date,
            'treatment_time' => $request->treatment_time,
            'result_subjective' => $request->result_subjective,
            'result_objective' => $request->result_objective,
            'result_blood_pressure' => $request->result_blood_pressure,
            'result_circulation_pulse' => $request->result_circulation_pulse,
            'result_breath_rr' => $request->result_breath_rr,
            'result_breath_spo2' => $request->result_breath_spo2,
            'result_temperature' => $request->result_temperature,
            'result_gcs' => $request->result_gcs,
            'result_presence_of_mind' => $request->result_presence_of_mind,
            'result_urine_total' => $request->result_urine_total,
            'result_urine_color' => $request->result_urine_color,
            'result_assessment_problem' =>$request->result_assessment_problem,
            'result_intervention' => $request->result_intervention,
            'assessment_id' => $request->assessment_id,
            'patient_id' => $request->patient_id
        ]);

        if ($response) {
            return response()->json([
                'success' => true,
                'message' => 'Treatment Log added successfully.'
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Failed to add treatment log.'
            ], 400);
        }
    }

    public function get($id)
    {
        $treatment = TreatmentLog::find($id);

        if ($treatment) {
            return response()->json([
                'success' => true,
                'message' => 'Treatment log found.',
                'data' => $treatment->load('user')
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Treatment log not found.'
            ], 404);
        }
    }

    public function getAll()
    {
        $treatment = TreatmentLog::all();

        if ($treatment) {
            return response()->json([
                'success' => true,
                'message' => 'Treatment log found.',
                'data' => $treatment
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Treatment log not found.'
            ], 404);
        }
    }
}

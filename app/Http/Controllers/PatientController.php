<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use App\Patient;
use App\TreatmentLog;
use App\Assessment;

class PatientController extends Controller
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

    public function register(Request $request)
    {
        $patient = Patient::find($request->id);

        if (!$patient) {
            $response = Patient::create([
                'id' => $request->id,
                'name' => $request->name,
                'date_of_birth' => $request->date_of_birth,
                'old' => $request->old,
                'address' => $request->address,
                'status' => 1
            ]);

            if ($response) {
                return response()->json([
                    'success' => true,
                    'message' => 'Patient registered successfully.',
                    'data' => $response
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to register.'
                ], 400);
            }
        } else {
            $patient->update(['status' => 1]);
            return response()->json([
                'success' => true,
                'message' => 'Patient has been registered, please continue.'
            ], 200);
        }
        
    }

    public function updatePatientStatus(Request $request, $id)
    {
        $patient = Patient::find($id);

        if ($patient) {
            $patient->update(['status' => $request->status]);
            return response()->json([
                'success' => true,
                'message' => 'Patient status has been updated succssfully.'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Patient not found.'
            ], 404);
         }
    }

    public function getPatientInfo($id)
    {
        $patient = Patient::find($id);

        if ($patient) {
            return response()->json([
                'success' => true,
                'message' => 'Patient found.',
                'data' => $patient
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Patient not found.'
            ], 404);
        }
    }

    public function getAll()
    {
        $patient = Patient::all();

        if ($patient) {
            return response()->json([
                'success' => true,
                'message' => 'Patient found.',
                'data' => $patient
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Patient not found.'
            ], 404);
        }
    }

    public function getPatientTreatment(Request $request, $patientId)
    {
        // dd($request->assessment_id);
        // $data = TreatmentLog::with(['user','treatmentImplementLog'])->get();
        // return response()->json($data,200);
        $patient = Patient::find($patientId);

        if ($patient) {
            $treatment = TreatmentLog::with('user')
                                        ->where('patient_id', $patientId)
                                        ->where('assessment_id', $request->assessment_id)
                                        ->get();
            return response()->json([
                'success' => true,
                'message' => 'Treatment log found.',
                'data' => $treatment
            ], 200);

        } else {
            return response()->json([
                'success' => false,
                'message' => 'User not found.'
            ], 404);
        }        
    }

    public function getPatientAssessment($patientId)
    {
        $patient = Patient::find($patientId);

        if ($patient) {
            // $assessment = Assessment::select(['date_assessment_complete',])->where('patient_id', $patientId)->get();
            $assessment = Assessment::join('users', 'users.id', '=', 'assessments.user_id')
                                        ->select('users.name', 'assessments.id', 'assessments.date_assessment_complete')
                                        ->where('patient_id', $patientId)
                                        ->get();

            return response()->json([
                'success' => true,
                'message' => 'Assessment found.',
                'data' => $assessment
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Patient not found.'
            ], 404);
        }
    }
}

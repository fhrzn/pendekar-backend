<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use App\Patient;

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
                'address' => $request->address
            ]);

            if ($response) {
                return response()->json([
                    'success' => true,
                    'message' => 'Patient registered successfully.'
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to register.'
                ], 400);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Patient has been registered.'
            ], 302);
        }
        
    }

    public function getPatientInfo($id)
    {
        $patient = Patient::find($id)->first();

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
}

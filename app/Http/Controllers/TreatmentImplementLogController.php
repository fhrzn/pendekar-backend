<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;
use App\TreatmentImplementLog;

class TreatmentImplementLogController extends Controller
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
        // dd(json_decode($request->getContent(), true));
        $action_list = [];
        foreach (json_decode($request->getContent(), true) as $a) {        
            $action_list[] = [
                'treatment_log_id' => $a["treatment_log_id"],
                'action' => $a["action"],
                'action_date' => $a["action_date"],
                'action_time' => $a["action_time"]
            ];
        }

        

        // $response = TreatmentImplementLog::create([
        //     'treatment_log_id' => $request->treatment_log_id,
        //     'action' => $request->action,
        //     'action_date' => $request->action_date,
        //     'action_time' => $request->action_time
        // ]);

        $response = TreatmentImplementLog::insert($action_list);

        if ($response) {
            return response()->json([
                'success' => true,
                'message' => 'Treatment implement log added successfullly.'
            ], 201);
        } else {
            return respone()->json([
                'success' => false,
                'message' => 'Failed to add treatment implement log.'
            ], 400);
        }
    }

    public function getAll()
    {
        $implement = TreatmentImplementLog::all();

        if ($implement) {
            return response()->json([
                'success' => true,
                'message' => 'Treatment implement log found.',
                'data' => $implement
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Treatment implement log not found.'
            ], 404);
        }
    }

    public function get($id)
    {
        $implement = TreatmentImplementLog::find($id);

        if ($implement) {
            return response()->json([
                'success' => true,
                'message' => 'Treatment implement log found.',
                'data' => $implement
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Treatment implement log not found.'
            ], 404);
        }
    }
}

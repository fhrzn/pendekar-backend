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
        
    }

    public function get($id)
    {
        
    }
}
